import os


def nginx(env: str, folderContainers: str) -> None:
    folderName: str = 'nginx'
    folderConfigName = 'conf.d'
    fileName = 'Dockerfile'
    fileConfigName = 'default.conf'

    os.mkdir(f"{folderContainers}/{folderName}")
    os.mkdir(f"{folderContainers}/{folderName}/{folderConfigName}")

    with open(f"{folderContainers}/{folderName}/{fileName}", 'a+') as _f:
        _f.write(f"""
FROM nginx:1.25.3-alpine
WORKDIR /var/www/sources
EXPOSE 80
        """)
        _f.close()

    with open(f"{folderContainers}/{folderName}/{folderConfigName}/{fileConfigName}", 'a+') as _cf:
        _cf.write("""
server {
    charset utf-8;
    client_max_body_size 128M;

    listen 80; ## слушать ipv4
    listen [::]:80; ## default_server ipv6only=on; ## слушать ipv6

    index index.php index.html;
    server_name localhost;
    root /var/www/sources/public;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
        add_header 'Access-Control-Allow-Origin' '*';
        add_header 'Access-Control-Allow-Methods' 'GET, POST, OPTIONS';
        add_header 'Access-Control-Allow-Headers' 'DNT,Users-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Range';
        add_header 'Access-Control-Expose-Headers' 'Content-Length,Content-Range';
    }

    location ~ [^/]\.php(/|$) {
        fastcgi_pass php-fpm:9000;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
        internal;
    }
}
            """)
        _cf.close()

def php(env: str, folderContainers: str) -> None:
    folderName: str = 'php-fpm'
    fileName = 'Dockerfile'
    fileConfigName = 'php.ini'
    fileXdebugName = 'xdebug.env'

    debianMirror = """
RUN echo "deb https://ftp.mpi-inf.mpg.de/mirrors/linux/debian/ bookworm main contrib non-free" > /etc/apt/sources.list && \\
    apt-get update \\
    """ if env == '2' else ''

    xdebug = """
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
    """ if env == '1' else ''
    xdebugConf = """
RUN install-php-extensions xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.env
RUN echo "xdebug.start_with_request = yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.env
RUN echo "xdebug.client_host=docker.for.mac.localhost" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.env
RUN echo "xdebug.client_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.env
RUN echo "xdebug.log=/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.env
RUN echo "xdebug.idekey = PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.env
    """ if env == '' else ''
    composerLocal = 'RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer' if env == '1' else ''


    os.mkdir(f"{folderContainers}/{folderName}")

    with open(f"{folderContainers}/{folderName}/{fileName}", 'a+') as _f:
        PUID = '${PUID}'
        PGID = '${PGID}'
        LOCALE = '${LOCALE}'
        INSTALL_FAKETIME = '${INSTALL_FAKETIME}'
        _f.write(f"""
FROM php:8.2-fpm

ARG PUID=1001
ENV PUID {PUID}
ARG PGID=1001
ARG LOCALE=POSIX

ENV PUID {PUID}
ENV PGID {PGID}
ENV LC_ALL {LOCALE}
ENV PHP_IDE_CONFIG 'serverName=old.???'

RUN {debianMirror} apt-get update && apt-get install -y \\
    zlib1g-dev \\
    libpq-dev \\
    libpng-dev \\
    libonig-dev \\
    libxml2-dev \\
    libmemcached-dev \\
    curl \\
    vim \\
    git \\
    zip \\
    unzip \\
    graphviz \\
    && docker-php-ext-install pdo pdo_pgsql pgsql

{xdebug}
RUN apt install -y postgresql-client
RUN apt install -y \\
        libzip-dev \\
        zip \\
        && docker-php-ext-install zip

RUN groupmod -o -g {PGID} www-data && \\
    usermod -o -u {PUID} -g www-data www-data

# Adding the faketime library to the preload file needs to be done last
# otherwise it will preload it for all commands that follow in this file
RUN if [ {INSTALL_FAKETIME} = true ]; then \\
    echo "/usr/lib/x86_64-linux-gnu/faketime/libfaketime.so.1" > /etc/ld.so.preload \\
;fi

# Configure locale.

{composerLocal}
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
{xdebugConf}

WORKDIR /var/www/sources
EXPOSE 9000
        """)
        _f.close()

    with open(f"{folderContainers}/{folderName}/{fileConfigName}", 'a+') as _fc:
        _fc.write("""
upload_max_file_size=500M
post_max_size=20000
max_input_vars=20000

error_reporting=~E_DEPRECATED
extension=mongodb.so

[xdebug]
xdebug.mode=debug
xdebug.idekey=docker
xdebug.start_with_request=yes
xdebug.log=/dev/stdout
xdebug.log_level=0
xdebug.client_port=9003
xdebug.mode=debug
xdebug.client_host=host.docker.internal
xdebug.discover_client_host=1
        """)
        _fc.close()
    with open(f"{folderContainers}/{folderName}/{fileXdebugName}", 'a+') as _fx:
        _fx.write("""
COMPOSER_MEMORY_LIMIT: 2G
XDEBUG_MODE=debug
XDEBUG_CONFIG=client_host=host.docker.internal client_port=9003
                """)
        _fx.close()


def postgres(env: str, folderContainers: str) -> None:
    folderName: str = 'postgres'
    os.mkdir(f"{folderContainers}/{folderName}")
    fileName = 'Dockerfile'
    with open(f"{folderContainers}/{folderName}/{fileName}", 'a+') as _f:
        TZ = '${TZ}'
        _f.write(f"""
FROM postgres:13.13-alpine3.19

ARG TZ=UTC
ENV LANG de_DE.utf8
ENV TZ {TZ}

RUN ln -snf /usr/share/zoneinfo/{TZ} /etc/localtime && \\
    echo {TZ} > /etc/timezone
EXPOSE 5432
WORKDIR /var/www/data/database
        """)
        _f.close()


def node(env: str, folderContainers: str) -> None:
    folderName: str = 'node'
    os.mkdir(f"{folderContainers}/{folderName}")
    fileName = 'Dockerfile'
    isProd = """
    RUN apk update \\
        && apk upgrade \\
        && apk add --update --no-cache git nasm gcc g++ libtool make cmake pkgconfig autoconf build-base automake bash gettext \\
        zlib zlib-dev libpng libpng-dev libwebp libwebp-dev libjpeg-turbo-dev giflib-dev tiff-dev lcms2-dev openssl \\
        && npm install -g npm@8.10.0
        """ if env == '1' else ""
    with open(f"{folderContainers}/{folderName}/{fileName}", 'a+') as _f:
        _f.write("""
FROM node:lts-alpine
WORKDIR /var/www/sources
{isProd}
ENTRYPOINT [ "npm",  "--ignore-platform-reqs" ]
        """.format(isProd=isProd))
        _f.close()


def composer(folderContainers: str) -> None:
    folderName: str = 'composer'
    os.mkdir(f"{folderContainers}/{folderName}")
    fileName = 'Dockerfile'
    with open(f"{folderContainers}/{folderName}/{fileName}", 'a+') as _f:
        _f.write(f"""
FROM composer:latest
WORKDIR /var/www/sources
ENTRYPOINT ["composer", "--ignore-platform-reqs"]
        """)
        _f.close()


def main(env: str):
    filename: str = 'docker-compose.yml'
    envFileName = '.example.env'
    folderContainers: str = 'docker'

    try:
        os.mkdir(folderContainers)
    except FileExistsError:
        pass

    nginx(env, folderContainers)
    postgres(env, folderContainers)
    php(env,folderContainers)
    node(env, folderContainers)

    if env == '2':
        composer(folderContainers)

    nginxPort: int = int(input('Укажите номер локального порта для NGINX: '))
    databasePort: int = int(input('Укажите номер локального порта для POSTGRESQL: '))
    projectName: int = input('Укажите название проекта: ')

    with open(envFileName, 'a+') as _f:
        _f.write(f"""
APP_LOCAL_PATH=sources
APP_CONTAINER_PATH=/var/www/sources
APP_CACHED=:cached

POSTGRES_PORT={databasePort}
POSTGRES_DATABASE={projectName}_db
POSTGRES_USER=raptor
POSTGRES_PASSWORD=lama22
POSTGRES_DBDATA=/var/lib/postgresql/data

PHP_FPM_EXTRA_HOST=host.docker.internal:host-gateway
PHP_FPM_CONFIG_PATH=/usr/local/etc/php/php.ini
PHP_FPM_LOG_PATH=/logs/php/

HTTP_PORT={nginxPort}
HTTP_LOCAL_CONFIG_PATH=nginx/conf.d/default.conf
HTTP_CONTAINER_CONFIG_PATH=/etc/nginx/conf.d/default.conf


NAME={projectName}
PUID=1000
PGID=1000
LOCALES_ADDITIONAL="ru_RU.UTF-8 en_EN.UTF-8 de_DE.UTF-8 es_ES.UTF-8"
LOCALE_DEFAULT=POSIX
TIMEZONE_DEFAULT=UTC
LOG_PATH=./data/log
DOCKER_PATH=docker
        """)
        _f.close()

    with open(filename, 'a+') as _df:
        _df.write("""
version: "3.8"
services:
  nginx:
    container_name: ${NAME}_nginx
    hostname: ${NAME}_nginx
    restart: always
    ports:
      - ${HTTP_PORT}:80
    build:
      context: ${DOCKER_PATH}/nginx
      dockerfile: Dockerfile
    volumes:
      - ./${DOCKER_PATH}/${HTTP_LOCAL_CONFIG_PATH}:${HTTP_CONTAINER_CONFIG_PATH}:ro
      - ./${APP_LOCAL_PATH}:${APP_CONTAINER_PATH}

  postgres:
    container_name: ${NAME}_postgres
    hostname: ${NAME}_postgres
    restart: always
    ports:
      - ${POSTGRES_PORT}:5432
    build:
      context: ${DOCKER_PATH}/postgres
      dockerfile: Dockerfile
    environment:
      POSTGRES_DATABASE: ${POSTGRES_DATABASE}
      POSTGRES_USER: ${POSTGRES_USER}
      POSTGRES_PASSWORD: ${POSTGRES_PASSWORD}
      POSTGRES_ROOT_PASSWORD: ${POSTGRES_PASSWORD}
    volumes:
      - .:/docker-entrypoint-initdb.d
      - dbdata:${POSTGRES_DBDATA}

  php-fpm:
    container_name: ${NAME}_php-fpm
    hostname: ${NAME}_php-fpm
    environment:
      docker: "true"
    extra_hosts:
      - ${PHP_FPM_EXTRA_HOST}
    build:
      context: ${DOCKER_PATH}/php-fpm
      dockerfile: Dockerfile
      args:
        - INSTALL_FAKETIME=false
        - INSTALL_LOCALES_ADDITIONAL=false
        - LOCALES_ADDITIONAL=${LOCALES_ADDITIONAL}
        - LOCALE=${LOCALE_DEFAULT}
        - TIMEZONE=${TIMEZONE_DEFAULT}
        - http_proxy
        - https_proxy
        - no_proxy
        - PUID=${PUID}
        - PGID=${PGID}
    env_file:
      - ${DOCKER_PATH}/php-fpm/xdebug.env
    volumes:
      - ./${APP_LOCAL_PATH}:${APP_CONTAINER_PATH}
      - ./${DOCKER_PATH}/php-fpm/php.ini:${PHP_FPM_CONFIG_PATH}:ro
    depends_on:
      - nginx
      - postgres

  node:
    container_name: ${NAME}_node
    hostname: ${NAME}_node
    environment:
      docker: "true"
    build:
      context: ${DOCKER_PATH}/node
      dockerfile: Dockerfile
    volumes:
      - ./${APP_LOCAL_PATH}:${APP_CONTAINER_PATH}
    depends_on:
      - php-fpm


volumes:
  dbdata:
    driver: local
        """)
        _df.close()


if __name__ == '__main__':
    ENV: tuple = ('development', 'production')
    env: str = input(f"Выберите окружение:\n\t1 - {ENV[0]}\n\t2 - {ENV[1]}\n\nВведите номер: ")

    if env == '1' or env == '2':
        main(env)
    else:
        print('Ошибка инициализации окружения!')