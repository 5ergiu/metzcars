<p align="center"><a href="https://metzcars.com" target="_blank"><img src="https://metzcars.com/logo/logo_lung.jpeg" width="400"></a></p>
<p align="center">Leasing & rent website to showcase the dealer's car listings</p>

Developed in [Laravel](https://github.com/laravel/laravel#readme) with [Docker](https://www.docker.com/) for easy use & implementation.

Contents
========

* [Tech stack](#tech-stack)
* [Installation](#installation)
* [Configuration](#configuration)
* [Release notes](#release-notes)
* [Scripts](#scripts)

### Tech stack

- 💻 Backend: &nbsp; PHP 8 | Laravel
- 🌐 Frontend: &nbsp; Blade | Bootstrap | SASS | JavaScript
- 🛢 Database: &nbsp; MySQL 8
- 🗄️ Server: &nbsp; Nginx 1.21
- 🛠️ Manage: &nbsp; Docker

### Installation

To get started, make sure you have [Docker](https://docs.docker.com/desktop/#download-and-install)
installed on your system, and then clone this repository.

### Configuration

1. Update hosts - add `127.0.0.1 metzcars.local`
2. Add `.docker/certs/local-metzcars.crt` certificate to trust store
3. Copy .env file `cp .env.example .env` and setup env variables
4. Run `docker-compose up -d`

***That's it!*** The website is up and running: https://metzcars.local

### Scripts

```
 ___  ___   ___  _ __  
/ __|/ _ \ / _ \| '_ \ 
\__ \ (_) | (_) | | | |
|___/\___/ \___/|_| |_|
```

### Release Notes

```
 ___  ___   ___  _ __  
/ __|/ _ \ / _ \| '_ \ 
\__ \ (_) | (_) | | | |
|___/\___/ \___/|_| |_|
```
