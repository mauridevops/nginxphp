# Main image
FROM php:7.4-fpm-alpine

# Install dependencies
RUN apk update && apk add --no-cache \
    bash \
    build-base shadow vim curl \
    php7 \
    php7-fpm \
    php7-common \
    php7-pdo \
    php7-pdo_mysql \
    php7-mysqli \
    php7-mcrypt \
    php7-mbstring \
    php7-xml \
    php7-openssl \
    php7-json \
    php7-phar \
    php7-zip \
    php7-gd \
    php7-dom \
    php7-session \
    php7-zlib \
    zip libzip-dev

# Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install pdo_mysql

#RUN docker-php-ext-install pdo pdo_mysql
#RUN docker-php-ext-enable pdo_mysql

RUN docker-php-ext-install zip exif

# Add php.ini
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
        
# Workdir for php
WORKDIR /var/www

# Run container
CMD ["php-fpm"]
