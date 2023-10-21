## Table of Contents

-   [Prerequisites](#prerequisites)
-   [Tech Stack](#tech-stack)
-   [Getting Started](#getting-started)
-   [Development](#development)
-   [Deployment](#deployment)
-   [Resources](#resources)

## Prerequisites

-   [PHP@8.0 and up ](https://www.php.net/downloads)
-   [Composer@2.3.5 and up ](https://getcomposer.org/download/)
-   [Laravel@10 and up](https://laravel.com/docs/7.x/installation)
-   [npm@8 and up](https://nodejs.org/en/download/)
-   [MySQL Latest](https://www.mysql.com/downloads/)

## Tech Stack

-   [PHP](https://www.php.net/)
-   [Laravel](https://laravel.com/)
-   [MySQL](https://www.mysql.com/)
-   [TailwindCSS](https://tailwindcss.com/)
-   [VueJS](https://vuejs.org/)

## Getting Started

-   Installation:

Clone the repository: `git clone https://github.com/Voyager56/autotech`

Go to the root directory of the repository: `cd autotech`

Install neccesary dependencies: `composer install`

Install node modules: `npm install`

Copy the .env file to the root directory: `cp .env.example .env`
and fill in the values for the database connection.

Generate the keys for the application: `php artisan key:generate`

Initialize the database: `php artisan migrate:fresh`

## Development

to run the application: `php artisan serve`
and for live reloading: `npm run dev`

## Deployment

-   ssh into the server: `ssh username@ipaddress`
-   run sudo apt update
-   run `sudo add-apt-repository ppa:ondrej/php`
-   run `sudo apt install php8.0 php8.0-curl php8.0-mbstring php8.0-xml php8.0-sqlite3`
-   run `sudo apt purge apache2`
-   to install sqlite3 run `sudo apt install zip sqlite3` and and for php `curl https://getcomposer.org/installer | php` then `sudo mv composer.phar /usr/bin/composer`
-   for node `curl https://deb.nodesource.com/setup_18.x | sudo bash ` then `sudo apt install nodejs`

-   install the application but use sqlite3 instead of mysql, run php artisan optimize for better performance

-   after all this install php-fpm and nginx and configure them.

## Resources

-   [Draw Sql](https://drawsql.app/teams/l-37/diagrams/autotech)
