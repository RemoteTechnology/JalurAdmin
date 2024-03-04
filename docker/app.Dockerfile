FROM php:8.2-fpm

RUN apt update
RUN apt install -y libpq-dev  \
    && docker-php-ext-install pdo pdo_pgsql pgsql
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN apt install -y postgresql-client
RUN apt install -y \
        libzip-dev \
        zip \
        && docker-php-ext-install zip
WORKDIR /var/www/src