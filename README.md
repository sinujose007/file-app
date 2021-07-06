# File management using Laravel 
Simple file management Laravel 8.0 with Laravel Breeze authentication.

-----
## Table of Contents

* [Features](#item1)
* [Quick Start](#item2)

-----
<a name="item1"></a>
## Features:
* Authentication
  * Login
  * User Creation
  * User Listing
  * File Uploads

-----
<a name="item2"></a>
## Quick Start:

Create new database : database name is = 'file-app' . You can give different name in .env

Clone this repository and install the dependencies.

    $ git clone https://github.com/sinujose007/file-app.git && cd file-app
    $ composer install

Run the command below to initialize. 

    $ php artisan migrate
	$ php artisan db:seed --class=RolesSeeder
	$ php artisan db:seed --class=UserSeeder

Finally, serve the application.

    $ php artisan serve

Open [http://localhost:8000](http://localhost:8000) from your browser. 
It will redirect to a login page , 

Please enter below admin credentials to login

username: admin@fileapp.com
password: 12345678

Menus are available for creating users, upload files etc.

After created normal users, they can also login and upload files.

-----
