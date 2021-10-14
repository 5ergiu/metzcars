FROM php:8.0.11-fpm-bullseye

ARG PHP_EXTENSIONS="gd pdo_mysql bcmath ctype fileinfo opcache"

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    curl \
    libzip-dev \
    nano

# Install extensions
RUN docker-php-ext-install pdo_mysql opcache fileinfo
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg && docker-php-ext-install -j$(nproc) gd

# Install node & yarn
RUN curl -fsSL https://deb.nodesource.com/setup_current.x -o nodesource_setup.sh && bash nodesource_setup.sh && apt-get update -y && apt-get install -y nodejs
RUN npm install -g yarn

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Add composer
COPY --from=composer /usr/bin/composer /usr/bin/

# Make www-data owner of the app
RUN chown -R www-data:www-data /var/www

USER www-data
