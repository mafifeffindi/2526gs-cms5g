FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
  libicu-dev libzip-dev unzip git \
  && docker-php-ext-install pdo pdo_mysql mysqli intl \
  && a2enmod rewrite \
  && rm -rf /var/lib/apt/lists/*

COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
