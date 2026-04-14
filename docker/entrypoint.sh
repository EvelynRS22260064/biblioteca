#!/bin/bash

# Iniciar PHP-FPM en segundo plano
php-fpm -D

# Esperar un poco
sleep 3

# Generar key si no existe
#php artisan key:generate --force

# Migraciones (opcional)
php artisan migrate --force

# Cachear config
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Iniciar Nginx
nginx -g "daemon off;"
