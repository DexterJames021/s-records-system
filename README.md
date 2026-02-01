<p align="center"> <a href="https://laravel.com" target="_blank"> <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo"> </a> </p>
Student Record System

## 📌 Project Task – Student Record System
Goal: Build a simple Student Record System using Laravel (PHP 8+) and MySQL.

Requirements
- laravel version 12.11.2
- php 8.3.6
- composer 2.9.3
- apache 2.4.58
- mysql 8.0.44
- node 24.12.0

Setup
```
git clone https://github.com/DexterJames021/s-records-system.git
cd s-records-system
composer install
npm install
npm run build   # or npm run dev
cp .env.example .env

php artisan key:generate
```

Update .env with your DB credentials, then:

``` 
php artisan migrate
php artisan db:seed
php artisan serve
```


## Test Account
Email: student@example.com
Password: password


## Routes
GET /login → Show login
POST /login → Login
POST /logout → Logout
students/* → Protected CRUD routes