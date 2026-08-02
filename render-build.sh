#!/usr/bin/env bash
set -o errexit

echo "--- 1. Installation des dépendances PHP ---"
composer install --no-dev --optimize-autoloader

echo "--- 2. Installation des dépendances Node.js ---"
npm install

echo "--- 3. Compilation des assets frontend avec Vite ---"
npm run build

echo "--- 4. Nettoyage et optimisation de Laravel ---"
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "--- 5. Exécution des migrations ---"
php artisan migrate --force