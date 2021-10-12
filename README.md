<p align="center"><a href="https://metzcars.com" target="_blank"><img src="https://metzcars.com/logo/logo_h.png" width="250"></a></p>
<p align="center">Leasing & rent website to showcase the dealer's car listings</p>

Developed in [Laravel](https://github.com/laravel/laravel#readme) with [Docker](https://www.docker.com/) for easy use & implementation.

Contents
========

* [Tech stack](#tech-stack)
* [Installation](#installation)
* [Configuration](#configuration)
* [Release notes](#release-notes)
* [Scripts](#scripts)
* [Development](#development)

### Tech stack

| | |
| --- | --- |
| 🛠️ Environment | Docker |
| 💻 Backend | PHP 8 (with [OPcache](https://devdojo.com/bobbyiliev/how-to-speed-up-your-laravel-application-with-php-opcache) & [JIT compiler](https://kinsta.com/blog/php-8/#jit)) - Laravel |
| 🌐 Frontend | Blade - Bootstrap - SASS - JavaScript ES6 |
| 🛢 Database | MySQL 8 |
| 🗄️ Server | Nginx 1.21 |

### Installation

To get started, make sure you have [Docker](https://docs.docker.com/desktop/#download-and-install)
installed on your system, and then clone this repository.

### Configuration

1. Update hosts - add `127.0.0.1 metzcars.local`
2. Add `.docker/certs/local-metzcars.crt` certificate to trust store
3. Copy .env file `cp .env.example .env` and setup env variables
4. Run `docker-compose up -d`
5. Install dependencies & build assets:
   1. *./bin composer install*
   2. *./bin yarn dev*

***That's it!*** The website is up and running: https://metzcars.local

### Scripts

In the root of the project directory you can run multiple scripts to ease development:

1. **./bin** : Used to run commands inside the app docker container
2. **./cache** : Clear all laravel cache configs

### Release Notes

1. Pull code from main git repo
2. If necessary:
   1. Run migrations *(in project root)* : **./bin php artisan migrate**
   2. Install new dependencies *(in project root)* : **./bin composer install**
   3. Build frontend assets *(in project root)* : **./bin yarn production**
   4. Restart/rebuild docker images/containers

### Development

* Each feature/task/issue is developed on a separate branch
* [SOLID](https://geekflare.com/php-solid-principles/)
* [Mobile first design](https://medium.com/@Vincentxia77/what-is-mobile-first-design-why-its-important-how-to-make-it-7d3cf2e29d00)
* [BEM methodology for CSS](https://en.bem.info/methodology/)
* Translations ordered alphabetically for ease of use
