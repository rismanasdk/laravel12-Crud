Cara Download Dan Install

git clone https://github.com/rismanasdk/laravel-crud-12.git

cd laravel-crud-12

composer install

cp .env.example .env      # (di Windows: copy .env.example .env)

php artisan key:generate

php artisan migrate

php artisan storage:link

php artisan serve         # (jalankan server lokal)
