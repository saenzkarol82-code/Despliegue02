FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    pkg-config \
    libssl-dev \
    ca-certificates \
    && rm -rf /var/lib/apt/lists/*

RUN update-ca-certificates

# Instalar una versión estable compatible del driver MongoDB
RUN pecl install mongodb-1.18.1 \
    && docker-php-ext-enable mongodb

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www/html

COPY . .

# Instalar dependencias dentro de Render
RUN composer install --no-dev --optimize-autoloader --ignore-platform-req=ext-mongodb

EXPOSE 80