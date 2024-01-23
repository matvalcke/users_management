FROM composer:2 as build

COPY . /app
WORKDIR /app

# Utilisez une image légère d'Alpine Linux avec PHP pour l'exécution
FROM php:8.2-fpm-alpine

COPY --from=build /app /var/www/html

WORKDIR /var/www/html

COPY .env.example .env

RUN php artisan key:generate

EXPOSE 9000

CMD ["php-fpm"]
