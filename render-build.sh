#!/usr/bin/env bash
set -o errexit

echo "--- Installation des dépendances PHP ---"
composer install --no-dev --optimize-autoloader

echo "--- Nettoyage et création du lien pour les images ---"
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan storage:link || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "--- Exécution des migrations ---"
php artisan migrate --force