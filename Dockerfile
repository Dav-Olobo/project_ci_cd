# Stage 1: Install Composer dependencies
FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

COPY . .

# Stage 2: PHP Runtime
FROM php:8.3-cli

WORKDIR /app

COPY --from=vendor /app /app

EXPOSE 10000

CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]