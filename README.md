# Fish i
ちくわを販売するデモサイトです。

## 環境構築
```
$ git clone https://github.com/takashi0602/fish-i.git
$ cd fish-i
$ cp .env.example .env
$ php artisan key:generate
$ touch database/database.sqlite
$ php artisan migrate
$ php artisan db:seed
$ php artisan serve
```
