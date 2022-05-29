FROM php:8.0-apache

RUN apt-get update && apt-get install -y unzip
RUN apt-get upgrade -y

RUN mkdir -p /var/www/html/resources && chown -R www-data:www-data /var/www/html/resources
WORKDIR /var/www/html

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.json
RUN composer install --no-dev

COPY install.php install.php
COPY index.php index.php
COPY src src
EXPOSE 80