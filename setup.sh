#!/usr/bin/env sh

test -f .env || cp .env.example .env

composer install &&
npm install &&
npm run prod &&
php artisan key:generate &&
chmod -R 777 storage bootstrap/cache &&
(sail up -d || (echo "Docker Container creation failed. Maybe Docker isn't running?" && exit 1)) &&
sleep 10 &&
sail artisan migrate:fresh &&

echo "App available under http://localhost/" &&
echo "To stop the application use sail down"
