#!/bin/bash

set -e

#Inicia applicação
composer dump-autoload
composer install

php artisan config:clear
php artisan cache:clear

php artisan migrate --force

echo "-----------------------"
echo "  Aplicação iniciada   "
echo "-----------------------"

exec php-fpm
