# E-Learning Laravel

This repository is a Laravel migration of a legacy procedural PHP e-learning project.

## Current Migration State

- Laravel 13 is now the root application.
- The original procedural app is preserved in `legacy/`.
- Laravel routes proxy the legacy student and admin flows:
  - `/` serves the student app.
  - `/admin` serves the admin/teacher app.
  - legacy POST/AJAX endpoints such as `/inc/*.php`, `/admin/inc/*.php`, `soal.php`, and `editor-upload.php` are routed through `LegacyController`.
- The sanitized legacy schema is available in `legacy/db/schema.sql` and is installable through Laravel migrations.
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

The app is intentionally migrated in stages. The compatibility layer keeps the existing screens reachable while pages are converted into native Laravel controllers, requests, policies, models, and Blade views.

Do not commit real uploaded assignments, profile photos, import spreadsheets, database dumps, or local config files.
