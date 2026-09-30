# FNX Mini CRM

A Laravel 13 admin panel for managing companies and employees, built for the FNXperts Web Developer Assessment.

## Features

- Admin login using the Laravel Livewire starter kit
- Public registration disabled
- Company and employee CRUD
- Company logo upload with a minimum size of 100 × 100 pixels
- Company and employee relationships using Eloquent
- Form Request validation
- Pagination with 10 records per page
- JSON API for a company, its employees, and `employee_count`

## Requirements

- PHP 8.4 or later
- Composer
- Node.js and npm
- SQLite
- Laravel Herd (recommended on macOS) or another local PHP server

## Installation

Clone the repository and open its folder in Terminal:

```bash
git clone https://github.com/Harez27/fnx-mini-crm.git
cd fnx-mini-crm
```

Install dependencies:

```bash
composer install
npm install
npm run build
```

Create the environment file and application key:

```bash
cp .env.example .env
php artisan key:generate
```

Set `DB_CONNECTION=sqlite` in `.env`, then create the database and run migrations with the admin seeder:

```bash
touch database/database.sqlite
php artisan migrate --seed
```

Create the public link for uploaded logos:

```bash
php artisan storage:link
```

Run the application using Laravel Herd, or start a local server:

```bash
php artisan serve
```

With `php artisan serve`, open `http://127.0.0.1:8000`.

## Admin login

The database seeder creates this assessment account:

- Email: `admin@admin.com`
- Password: `password`

This account is for local assessment use. Public registration is disabled.

## API

The API endpoint is:

```text
GET /api/companies/{company}
```

For example, after creating a company with ID 1:

```text
http://127.0.0.1:8000/api/companies/1
```

The JSON response includes the company attributes, `employee_count`, and an `employees` array. The endpoint can be tested in a browser, Postman, or with `curl`:

```bash
curl http://127.0.0.1:8000/api/companies/1
```

## Pagination demonstration

Company and employee lists show 10 records per page. To add sample records for checking pagination, run this once from the project folder:

```bash
php artisan tinker --execute='for ($i = 1; $i <= 11; $i++) { $company = \App\Models\Company::firstOrCreate(["name" => "Demo Company " . $i]); \App\Models\Employee::firstOrCreate(["first_name" => "Demo", "last_name" => "Employee " . $i, "company_id" => $company->id]); }'
```

The sample data is created locally and is not required for normal use.

## Screenshots

Screenshots demonstrate the company and employee CRUD pages,
pagination, company logo upload, and API response.

[View assessment screenshots](screenshots/)

## Notes

Company logos are saved on Laravel's `public` disk and accessed through the `public/storage` link. A company with employees must have those employees removed or reassigned before the company can be deleted.