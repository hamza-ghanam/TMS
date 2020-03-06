# TMS
A simple Task Management System

## About my TMS
It's a very simple Laravel web application for task management, so you can: 
1. Create task (task name, priority, timestamps) 
2. Edit task.
3. Delete task.
4. Reorder tasks with drag and drop in the browser. Priority is automatically updated based on this. (e.g. #1 priority goes at top, #2 next down and so on.)
Tasks are saved to a MySQL database.

My TMS has project functionality to the tasks. So user is able to select a project from a dropdown and only view tasks associated with that project!

## Installation

First of all, You should download the source code for this project and run it on your local machine, you may clone its Git repository and install its dependencies:

```bash
git clone https://github.com/ALH-Software/TMS.git TMS
cd TMS
composer install
```

For more complete documentation on building a local Laravel development environment, check out the full [Homestead](https://laravel.com/docs/6.x/homestead) and [installation](https://laravel.com/docs/6.x/installation) documentation.

Now you need NPM in order to install Node Modules. If you didn't install Node Package Manager (NPM) before, you can download and install it using following commands:

```bash
curl -sL https://deb.nodesource.com/setup_10.x | sudo -E bash -
```

For Debian:

```bash
sudo apt install nodejs
```

For RedHat:

```bash
sudo yum install nodejs
```

For Windows, just download Node.js installer from [Here](https://nodejs.org/en/download/).


Verify that the Node.js and npm were successfully installed by printing their versions:

```bash
node --version
```

Now, you're ready to install Node Modules using the following command:

```bash
npm install
```

## Prepping The Database

Now, you need to create a MySQL database, called "tms_db", so you should have MySQL DB Engine installed and ready, then run the commands:

```bash
mysql -u root -p
CREATE DATABASE tms_db CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
```

Now, edit your .env config file, then run the following command ti migrate the database:

```bash
php artisan migrate
```

## Run the project 

You can run the project using:

```bash
php artisan serve
```

## Route list of the project

Here is the route list of the project:

<p align="center"><img src="public/images/route_list.PNG" width="800"></p>

---

# About Laravel

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT.

---
