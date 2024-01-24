# Phase de construction
FROM composer:2 as build

COPY . /app
WORKDIR /app

RUN apk add --no-cache --virtual build-essentials \
    icu-dev icu-libs zlib-dev g++ make automake autoconf libzip-dev \
    libpng-dev libwebp-dev libjpeg-turbo-dev freetype-dev && \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install gd && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install pdo && \
    docker-php-ext-install intl && \
    docker-php-ext-install opcache && \
    docker-php-ext-install exif && \
    docker-php-ext-install zip && \
    apk del build-essentials && rm -rf /usr/src/php*

COPY .env.example .env
RUN composer update
RUN php artisan key:generate


# Phase d'exécution
FROM php:8.2-fpm-alpine

COPY --from=build /app /var/www/html

WORKDIR /var/www/html

EXPOSE 8000
