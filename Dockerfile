FROM composer:2 AS build

WORKDIR /skeleton
RUN composer create-project laravel/laravel . "^12.0" --no-interaction --prefer-dist

WORKDIR /app
RUN cp -a /skeleton/. /app/
COPY . /app/
RUN rm -f bootstrap/cache/*.php \
    && composer install --no-dev --optimize-autoloader --no-interaction

FROM php:8.3-cli
RUN apt-get update \
    && apt-get install -y --no-install-recommends libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*
WORKDIR /var/www/html
COPY --from=build /app /var/www/html
RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs \
    && chown -R www-data:www-data storage bootstrap/cache
USER www-data
CMD ["sh", "-c", "php artisan config:clear && if [ -n \"${DB_URL:-}\" ]; then php artisan migrate --force && php artisan db:seed --class=CategorySeeder --force; fi && php -S 0.0.0.0:${PORT:-10000} -t public server.php"]
