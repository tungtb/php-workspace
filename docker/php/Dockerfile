FROM php:8.1-fpm

RUN apt-get update
RUN apt-get install -y autoconf pkg-config libssl-dev libzip-dev git curl zip unzip zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev
RUN apt-get update && apt-get install -y supervisor

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install gd

# MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli zip

# MongoDB
RUN pecl install mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini

# Install PhpRedis extension
RUN pecl install redis && docker-php-ext-enable redis

# Xdebug
RUN pecl install xdebug-3.1.2
ADD xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini