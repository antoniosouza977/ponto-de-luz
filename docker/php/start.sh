#!/bin/bash

composer install

php artisan config:clear
php artisan cache:clear

php artisan migrate --force

chmod 777 -R ./storage

echo "-----------------------"
echo "  Aplicação iniciada   "
echo "-----------------------"

exec php-fpm
