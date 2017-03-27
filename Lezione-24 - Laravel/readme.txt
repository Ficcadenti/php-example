Per installare laravel con composer:

composer create-project laravel/laravel ${applicationName} --prefer-dist

composer create-project laravel/laravel esemipo_01 --prefer-dist

cd esemipo_01
composer update 
artisan key:generate
php artisan serve
