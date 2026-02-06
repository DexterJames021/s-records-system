<p align="center"> <a href="https://laravel.com" target="_blank"> <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo"> </a> </p>

## 📌 Project Task – Student Record System
Goal: Build a simple Student Record System using Laravel (PHP 8+) and MySQL.

### Instructions:

1. When creating a student, assigning 5 subjects is optional.
2. When updating a student (blue button), assigning 5 subjects is required for the grading system to be applied.
3. After updating, submit the update form to store the grades.
4. To view the average, click Show (eye button) to see the subjects along with their grades and average.
5. Deleting a student does not permanently remove the record from the database.

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
> Email: student@example.com
> Password: password


## Routes
- GET /login → Show login
- POST /login → Login
- POST /logout → Logout
- students/* → Protected CRUD routes
