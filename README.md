## About Project

# Plugins

- [Laravel JetStream](https://jetstream.laravel.com/introduction.html).

# Tech Stack

- [Laravel](https://laravel.com).
- [Livewire](https://livewire.laravel.com).
- [TailwindCSS](https://tailwindcss.com).
- [FilamentPHP V3](https://filamentphp.com).

## Installation
- Clone the repository
```bash
git clone https://github.com/njugunamwangi/laracom.git
```
- On the root of the directory, copy and paste .env.example onto .env and configure the database accordingly
 ```bash
copy .env.example .env
```

- Install composer dependencies bu running composer install
 ```bash
composer install
```
- Install npm dependencies
```bash
npm install
```

- Run migrations and seed admin user
```bash
php artisan migrate --seed
```

- Generate laravel application key using 
```bash
php artisan key:generate
```

- Run laravel application using 
```bash
php artisan serve
```
- Run react application using 
```bash
npm run dev
```

- Storage
```bash
php artisan storage:link
```
## Prerequisites

- Admin credentials
```bash
email: admin@admin.com
password: password
```

- Admin url
```bash
http://admin.laracom.test
```

## License

[MIT](https://choosealicense.com/licenses/mit/)

