# E-Learning Laravel

This repository contains a Laravel version of the e-learning project database and application skeleton.

## Current Migration State

- Laravel 13 is the root application.
- The native PHP compatibility layer has been removed.
- The sanitized e-learning schema is available in `database/schema/elearning.sql` and is installable through Laravel migrations.
- Starter Eloquent models exist for `tb_siswa`, `tb_pengajar`, and `tb_admin`.

## Setup

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Set the database variables in `.env` before running migrations:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=elearning
DB_USERNAME=root
DB_PASSWORD=
```

## Migration Notes

The native PHP module has been removed. Any remaining student/admin screens should be rebuilt as Laravel controllers, requests, policies, models, and Blade views.

Do not commit real uploaded assignments, profile photos, import spreadsheets, database dumps, or local config files.
