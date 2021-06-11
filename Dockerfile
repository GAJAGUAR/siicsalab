# builder
FROM node:lts-alpine as node

COPY . /app

WORKDIR /app

RUN apk update \
&& apk add --no-cache python3 make g++ \
&& npm install && npm run dev \
&& rm -fr node_modules

# application
FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql bcmath

COPY --from=node /app /app/

WORKDIR /app

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache zip \
&& composer install --optimize-autoloader --no-dev \
&& php artisan key:generate \
&& php artisan config:cache

EXPOSE 8000

CMD php artisan serve --host 0.0.0.0 --port 8000

