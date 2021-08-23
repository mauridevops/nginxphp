# Main image
FROM php:7.4-fpm-alpine

RUN apk update

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install dependencies
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions gd xdebug mysqli curl dom exif fileinfo hash imagick json mbstring pcre sodium xml zip

#mail function
RUN apk add msmtp
COPY msmtprc /etc/msmtprc
RUN chmod 600 /etc/msmtprc
RUN sed -i "s|EMAILDOMAIN|${EMAILDOMAIN} |g" /etc/msmtprc
RUN sed -i "s|ADMINEMAILSMTP|${ADMINEMAILSMTP} |g" /etc/msmtprc
RUN sed -i "s|ADMINEMAILPASSWD|${ADMINEMAILPASSWD} |g" /etc/msmtprc
RUN sed -i "s|ADMINEMAILSMTP|${ADMINEMAILSMTP} |g" /etc/msmtprc 

# Workdir for php
WORKDIR /var/www

# Run container
CMD ["php-fpm"]
