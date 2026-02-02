FROM node:24 AS build
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

FROM php:8.3-fpm
WORKDIR /var/www/html
COPY --from=build /app /var/www/html
RUN apt-get update && apt-get install -y libzip-dev unzip libpng-dev
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data storage bootstrap/cache
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV PORT=10000
EXPOSE $PORT
CMD php artisan serve --host=0.0.0.0 --port=$PORT
