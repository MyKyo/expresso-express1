clone
composer install
cp .env.example .env
php artisan key:generate
ganti database env
php artisan migrate
php artisan storage:link
php artisan serve
