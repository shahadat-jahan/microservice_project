FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip git curl

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
