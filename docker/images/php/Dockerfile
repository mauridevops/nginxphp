FROM php:7.4-apache
ARG DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip \
    && apt-get update -y \
    && apt-get install msmtp -y
    
COPY msmtprc /etc/msmtprc
RUN chmod 600 /etc/msmtprc
RUN sed -i "s|EMAILDOMAIN|${EMAILDOMAIN} |g" /etc/msmtprc
RUN sed -i "s|ADMINEMAILSMTP|${ADMINEMAILSMTP} |g" /etc/msmtprc
RUN sed -i "s|ADMINEMAILPASSWD|${ADMINEMAILPASSWD} |g" /etc/msmtprc
RUN sed -i "s|ADMINEMAILSMTP|${ADMINEMAILSMTP} |g" /etc/msmtprc

RUN touch /usr/local/etc/php/conf.d/mail.ini \
    && echo "smtp_port = 587;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_max_filesize = 512M;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 256M;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_execution_time	= -1;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 1024;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_input_vars = 1024;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "sendmail_path = /usr/bin/msmtp -t;" >> /usr/local/etc/php/conf.d/uploads.ini


RUN a2enmod rewrite
