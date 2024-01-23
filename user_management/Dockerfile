# Utilisez une image PHP avec Composer préinstallé
FROM composer:2 as build

# Copiez les fichiers de l'application dans le conteneur
COPY . /app
WORKDIR /app

# Installez les dépendances avec Composer
RUN composer install --ignore-platform-reqs --no-scripts

# Utilisez une image légère d'Alpine Linux avec PHP
FROM php:8.0-fpm-alpine

# Copiez les fichiers de l'application depuis le conteneur de construction
COPY --from=build /app /var/www/html

# Définissez le répertoire de travail
WORKDIR /var/www/html

# Copiez le fichier de configuration de l'environnement
COPY .env.example .env

# Générez la clé d'application
RUN php artisan key:generate

# Exposez le port 9000 pour le serveur PHP-FPM
EXPOSE 9000

# Commande par défaut pour le conteneur
CMD ["php-fpm"]
