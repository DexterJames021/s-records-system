# ---------- STAGE 1: Build frontend ----------
FROM node:20-alpine AS frontend

WORKDIR /app
COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# ---------- STAGE 2: PHP ----------
FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip curl \
    libzip-dev libpng-dev libonig-dev \
    default-mysql-client default-libmysqlclient-dev \
    libfreetype6-dev libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip gd bcmath

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy Laravel source
COPY . .

# Copy built frontend assets from Node stage
COPY --from=frontend /app/public/build /app/public/build

RUN composer install --no-dev --optimize-autoloader

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
