# Portal Majalengka

## About

Yap, ini project Portal untuk Kabupaten Majalengka

## Install

prepare your `.env` file

### With Docker

Create image and run container 
```bash
./vendor/bin/sail up -d
```

Migrate database
```bash
./vendor/bin/sail artisan migrate
```

### Without Docker 

Install package
```bash
composer install
```

Migrate database
```bash
php artisan migrate
```

run app
```bash
npm install && npm run build
composer run dev
```
or
```bash
php artisan serve
```
