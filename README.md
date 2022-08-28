<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p align="center">
<img src="https://th.bing.com/th/id/R.3ede7345ec3978157e7be476efac88e9?rik=dEpaZzEAd01syA&pid=ImgRaw&r=0" width="150">
</p>

# Social Media
## About
This is a sample of Instagram that has four parts of admin,normal user, silver user and golden user.
The whole of project is SSG.
## Used packages
- Breeze (authentication)
## Installation
> **Note:** First of all create **socialmedia** database
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
In other terminal(this is for breeze package):
```bash
npm install
npm run dev
```
## Roles
### Admin
#### Login
You can sign in as a admin with these information:
- Email: admin@gmail.com
- Password: 12345678
#### Features
- Add post
- Check users' accessibility and edit them
- Edit personal information
- Like posts
- Post comments
### Users
#### Login
When you run application, factory will create some sample users, you can find email of users and password of all of them is: 12345678
#### Normal user
##### Features
- Like posts
- Edit personal information

#### Silver user
##### Features
- Like posts
- Post comments
- Edit personal information
#### Golden user
##### Features
- Archive posts and see them
- Like posts
- Post comments
- Edit personal information

