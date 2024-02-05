FROM php:8.2-fpm

RUN apt update
RUN apt install -y libpq-dev
RUN docker-php-ext-install pdo pdo_pgsql pgsql
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
WORKDIR /var/www/src