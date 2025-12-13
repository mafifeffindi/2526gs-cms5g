FROM php:8.2-apache

# Install dependency untuk intl + ekstensi yang dibutuhkan CI4
RUN apt-get update && apt-get install -y \
        libicu-dev \
    && docker-php-ext-install intl mysqli pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Aktifkan mod_rewrite
RUN a2enmod rewrite

# Pakai VirtualHost sendiri
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
