# Pet Life Laravel
 
## Installation

Install the dependencies and start the server.

Make sure you install xampp and composer

```sh
git clone https://github.com/jersoncarin-dev/Pet-Life-Laravel.git
cd Pet-Life-Laravel
composer install
php artisan migrate
php artisan voyager:install
php artisan voyager:admin your@email.com --create
php artisan serve
```
Note please rename the .env.example to .env and Edit the DB_USER and DB_PASSWORD accordingly to the database credential in your system and also edit the your@email.com to your own email address
