# Main image
FROM php:7.4-fpm-alpine

# Install PHP extensions deps
RUN apt-get update \
    && apt-get install --no-install-recommends -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        zlib1g-dev \
        libicu-dev \
        g++ \
        unixodbc-dev \
        libxml2-dev \
        libaio-dev \
        libmemcached-dev \
        freetds-dev \
	libssl-dev \
	openssl \
        libgearman-dev \
        libpq-dev
  
 # Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-configure pdo_dblib --with-libdir=/lib/x86_64-linux-gnu \
    && pecl install sqlsrv-4.1.6.1 \
    && pecl install pdo_sqlsrv-4.1.6.1 \
    && pecl install redis \
    && pecl install memcached \
    && docker-php-ext-install \
            iconv \
            mbstring \
            intl \
            mcrypt \
            gd \
            pgsql \
            mysqli \
            pdo_pgsql \
            pdo_mysql \
            pdo_dblib \
            soap \
            sockets \
            zip \
            pcntl \
            ftp \
            exif \
    && docker-php-ext-enable \
            sqlsrv \
            pdo_sqlsrv \
            redis \
            memcached \
            opcache \
            gearman.so
        
 
# Workdir for php
WORKDIR /var/www

# Run container
CMD ["php-fpm"]
