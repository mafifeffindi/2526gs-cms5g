FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    bash curl git unzip icu-dev oniguruma-dev libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl mbstring mysqli pdo pdo_mysql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

RUN addgroup -g 1000 -S www \
    && adduser -u 1000 -S www -G www \
    && chown -R www:www /var/www/html

USER www
