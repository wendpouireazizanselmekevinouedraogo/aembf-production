#!/usr/bin/env bash
set -o errexit

echo "Mise en place de Composer..."
curl -sS https://getcomposer.org/installer | php

echo "Installation des dépendances Laravel..."
php composer.phar install --no-dev --optimize-autoloader

echo "Optimisation et migrations..."
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force