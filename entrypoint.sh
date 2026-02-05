#!/bin/sh
# Clear Laravel caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Run migrations safely (for dev)
# php artisan migrate --force

#brutrforce for database
php artisan migrate:fresh --force 

php artisan db:seed

# Start Laravel
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}

