FROM php:8.0-apache

RUN apt-get update && apt-get install -y unzip
RUN apt-get upgrade -y

WORKDIR /var/www/html

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --no-dev

COPY install.php install.php
COPY index.php index.php
COPY resources resources
COPY src src
EXPOSE 80