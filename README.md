#laravel-simple-note train


laravel/ui環境構築
#1 appコンテナで実行
composer require laravel/ui "4.*"
php artisan ui vue --auth
npm install && npm run dev
npm audit fix
npm audit fix --force
npm run dev

artisanでserveする場合
php artisan serve --host=0.0.0.0 --port=9090