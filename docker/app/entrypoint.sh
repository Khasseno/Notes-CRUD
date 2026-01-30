#!/bin/bash
set -e

echo "Initialize Laravel Project"

# Environment
if [ ! -f .env ]; then
    echo "Create .env file"
    cp .env.example .env
    echo ".env file is created"
else
    echo ".env file is created"
fi

# Composer Vendor
if [ ! -d "vendor" ] || [ ! -f "vendor/autoload.php" ]; then
    echo "Installing Composer Dependencies"
    composer install --no-dev --no-interaction --optimize-autoloader --ignore-platform-req=ext-http
    echo "Composer Dependencies installed"
else
    echo "Composer Dependencies installed"
fi

# Generating APP_KEY
if grep -q "APP_KEY=$" .env || grep -q "APP_KEY=\"\"" .env; then
    echo "App key generating..."
    php artisan key:generate --force
    echo "App key is generated"
else
    echo "App key is generated"
fi

# Bootstrap
if [ ! -d "node_modules" ]; then
    echo "Install bootstrap modules"
    npm install
    echo "Bootstrap installed"
else
    echo "Bootstrap installed"
fi

# Bootstrap assets Build
if [ ! -d "public/build" ]; then
    echo "Bootstrap assets building"
    npm run build
    echo "Bootstrap asset built"
else
    echo "Bootstrap asset built"
fi

# Access setting
echo "Setting up access right"
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Migration
echo "Database Migration"
php artisan migrate --force

echo "Laravel Project is up: http://localhost:8000"

# Запуск PHP-FPM
exec "$@"
