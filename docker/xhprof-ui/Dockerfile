FROM php:7.4-cli

RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    zip \
    unzip \
    libpq-dev \
    libssl-dev \
    libcurl4-openssl-dev \
    graphviz \
    && apt-get clean

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN git clone https://github.com/perftools/xhgui.git /xhgui

RUN pecl install mongodb
RUN docker-php-ext-enable mongodb

WORKDIR /xhgui

RUN composer install --no-dev

COPY config.php /xhgui/config/config.php

RUN mkdir -p /xhgui/cache
RUN chmod -R 777 /xhgui/cache

EXPOSE 8082

CMD ["php", "-S", "0.0.0.0:8082", "-t", "/xhgui/webroot"]