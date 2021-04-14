## Installation

Clone the repo locally:

```sh
git clone https://github.com/rheznendra/boj-jdg-web.git
cd boj-jdg-web
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Edit database configuration in .env:

```sh
DB_DATABASE=database_name
DB_USERNAME=database_username (default root)
DB_PASSWORD=database_password (default empty)
```

Run database migrations:

```sh
php artisan migrate
```
