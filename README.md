# To Do List

Clear as its name, a To do List

Runtimes, engines, tools ...

I used xampp for local environment development and testing so here are the detailed technologies and its corresponding versions
  + Apache 2.4.41
  + MariaDB 10.4.6
  + phpMyAdmin 4.9.0.1
  + OpenSSL 1.1.0g
  + ADOdb 518a
  + Mercury Mail Transport System v4.63 (not included in the portable version)
  + FileZilla FTP Server 0.9.41 (not included in the portable version)
  + Webalizer 2.23-04 (not included in the portable version)
  + Strawberry Perl 5.16.3.1 Portable
  + Tomcat 7.0.92
  + XAMPP Control Panel Version 3.2.4.
  
PHP, Laravel versions
  + PHP 8.0.0 
  + Laravel Framework 8.22.1  
  
Bonus

  + Boostrap v4.3.1 (CDN)
  + Postman Version 7.36.1
  
  
# How to Run the app

Clone the repo from https://github.com/gutierrezS98/To_Do.git 

cd into the created project folder

Install composer dependencies with 'composer install'

Create a copy of your .env file (.env.example is provided with the setup you need to use)

Generate an app encryption key 
```sh
    php artisan key:generate
```
Create an empty database for the app (in .env.example you can see the name which was used during development -> 'todo') 
```sh
    CREATE DATABASE todo
```

Lastly migrate the database
```sh
    php artisan migrate
```
