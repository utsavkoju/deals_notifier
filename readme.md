## Project Name: Deal Notifier

## Initial Setup:

This web application will aggregates all the deals offered by the retailers in your surrounding. Our AI is smart enough to learn your behaviour and wisely suggest the best deals that’s available on the market.

## Getting Started

As we are aggregating deals from the local retailer, first and foremost please build a good rapport with your neighbours.

### Prerequisites

The application will import, analyze, evaluate and suggest tones of information so a good server is a must. We recommend to own a AWS or Azure server with at least dual core CPU and 2 gb of RAM. 

### Installing


For hosting the application within your computer, you need to install following softwares.
XAMPP
An apache development environment.
Apache Version 2.0
PHP Version 7.0
Composer
PHP dependency Management System
Sublime Text 3
A lightweight IDE   
Download or clone the repository from our github page. Move them to the htdocs folder of your XAMPP server. Open Terminal (mac or linux) and Command prompt (windows) and navigate to this project folder and run following command.

```Console
Composer update
```
This command will download all the dependencies related to our project into your hosted system.
Provide your database server credentials into the `.env` file which is available on the root of the project. After that run following commands for the execution of the migration.
``` Console
php artisan migrate
php artisan db:seed
```
Now system can be accessed going through `http://localhost/[project_name]` on the browser of your choice.

## Built With

* [Bootstrap](https://getbootstrap.com/docs/4.1/getting-started/introduction/)
Responsive webpage framework
* [Laravel](https://laravel.com/) - PHP Framework
* [Composer](https://getcomposer.org/) - Dependency Manager

## Authors

***Anisha Shrestha***
***Kritika Sijapati*** 

## Acknowledgments
