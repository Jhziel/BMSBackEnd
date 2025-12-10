#!/bin/bash

set -e

echo "Waiting for mysql to be ready..."
/wait
echo "Mysql Database is ready continuing the setup...."

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Creating a env file for $APP_ENV"
    cp .env.example .env
else
    echo "env file already exists"
fi

php artisan migrate
php artisan key:generate
php artisan cache:clear
php artisan route:clear
php artisan config:clear

php artisan serve --port=${PORT} --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"
