FROM php:8.0-fpm-alpine

ARG PHP_EXTENSIONS="gd pdo_mysql bcmath ctype fileinfo opcache"

WORKDIR /var/www

RUN set -xe; \
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
        # build tools
        autoconf g++ gcc make \
        # lib tools
        bzip2-dev freetype-dev gettext-dev icu-dev imagemagick-dev libintl libjpeg-turbo-dev unixodbc-dev \
        # libmcrypt-dev
        libpng-dev libxslt-dev libzip-dev \
        ; \
    docker-php-ext-configure gd --enable-gd \
        --with-freetype --with-jpeg \
    ; \
    docker-php-ext-configure pdo_mysql --with-pdo-mysql ; \
    docker-php-ext-configure opcache --enable-opcache; \
    docker-php-ext-install -j$(nproc) \
        $PHP_EXTENSIONS \
    ; \
    runDeps="$( \
      scanelf --needed --nobanner --format '%n#p' --recursive /usr/local/lib/php/extensions \
        | tr ',' '\n' \
        | sort -u \
        | awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
    )"; \
      apk add --virtual .phpexts-rundeps $runDeps; \
      apk del .build-deps && \
      rm -rf /tmp/*

# Get composer
COPY --from=composer /usr/bin/composer /usr/bin/

# www-data owns files
# TODO: RUN php artisan opcache:clear # clear cache
