
FROM php:8.2-fpm

ARG PUID=1001
ENV PUID ${PUID}
ARG PGID=1001
ARG LOCALE=POSIX

ENV PUID ${PUID}
ENV PGID ${PGID}
ENV LC_ALL ${LOCALE}
ENV PHP_IDE_CONFIG 'serverName=old.???'

RUN echo "deb https://ftp.mpi-inf.mpg.de/mirrors/linux/debian/ bookworm main contrib non-free" > /etc/apt/sources.list && apt-get update && apt-get install -y \
    zlib1g-dev \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libmemcached-dev \
    curl \
    vim \
    git \
    zip \
    unzip \
    graphviz \
    && docker-php-ext-install pdo pdo_pgsql pgsql


RUN apt install -y postgresql-client
RUN apt install -y \
        libzip-dev \
        zip \
        && docker-php-ext-install zip

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

# Adding the faketime library to the preload file needs to be done last
# otherwise it will preload it for all commands that follow in this file
RUN if [ ${INSTALL_FAKETIME} = true ]; then \
    echo "/usr/lib/x86_64-linux-gnu/faketime/libfaketime.so.1" > /etc/ld.so.preload \
;fi

# Configure locale.


RUN apt-get clean && rm -rf /var/lib/apt/lists/*
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/


WORKDIR /var/www/sources
EXPOSE 9000
        