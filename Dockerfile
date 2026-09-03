# syntax=docker/dockerfile:1

# ---------- Stage 1: Composer dependencies ----------
FROM composer:2 AS vendor

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
        --no-dev \
        --no-scripts \
        --no-autoloader \
        --prefer-dist \
        --no-interaction \
        --no-progress \
        --ignore-platform-reqs

COPY . .
RUN composer dump-autoload --optimize --classmap-authoritative --no-dev --no-scripts

# ---------- Stage 2: PHP-FPM runtime ----------
FROM php:8.0-fpm-bullseye AS app

# System deps for the PHP extensions we need
RUN apt-get update && apt-get install -y --no-install-recommends \
        libzip-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libonig-dev \
        default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        pdo_mysql \
        mbstring \
        bcmath \
        exif \
        pcntl \
        zip \
        gd \
        opcache \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Sensible PHP defaults for a small production box
COPY docker/php/php.ini /usr/local/etc/php/conf.d/zz-app.ini

WORKDIR /var/www/html

# Application code + vendored dependencies
COPY --chown=www-data:www-data . .
COPY --from=vendor --chown=www-data:www-data /app/vendor ./vendor

# Runtime dirs Laravel needs to write to
RUN mkdir -p \
        storage/framework/cache \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
        public/uploads/users \
    && chown -R www-data:www-data storage bootstrap/cache public/uploads \
    && chmod -R ug+rwX storage bootstrap/cache public/uploads

COPY docker/php/entrypoint.sh /usr/local/bin/entrypoint
RUN chmod +x /usr/local/bin/entrypoint

USER www-data

ENTRYPOINT ["entrypoint"]
CMD ["php-fpm"]
