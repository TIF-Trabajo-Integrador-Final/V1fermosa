#!/bin/bash

echo "Iniciando build para producción"

# Limpiar dependencias Node
rm -rf node_modules
rm -f package-lock.json

# Instalar dependencias
npm install

# Generar build de producción
npm run build

# Limpiar cachés de Laravel
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Generar cachés optimizados
php artisan config:cache
php artisan route:cache

# Verificar storage link
php artisan storage:link || true

echo "Build completo. Listo para producción."
echo "Ejecute:"
echo "git add public/build"
echo "git commit -m 'Build para producción'"
echo "git push origin release/v1.0"
