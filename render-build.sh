#!/usr/bin/env bash
set -o errexit

echo "Téléchargement et installation de Composer..."
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"

echo "Installation des dépendances PHP avec Composer..."
php composer.phar install --no-dev --optimize-autoloader

echo "Nettoyage et mise en cache de Laravel..."
php composer.phar dump-autoload
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force