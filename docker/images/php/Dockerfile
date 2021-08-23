# Main image
FROM php:${PHPVERSION}-fpm-alpine

RUN apk update
RUN apk add msmtp

COPY msmtprc /etc/msmtprc
RUN chmod 600 /etc/msmtprc

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install dependencies
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions gd xdebug mysqli curl dom exif fileinfo hash imagick json mbstring pcre sodium xml zip
        
# Workdir for php
WORKDIR /var/www

# Run container
CMD ["php-fpm"]
