FROM php:7.4-apache
ARG DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip \
    && apt-get update -y \
    && apt-get install sendmail -y \
    && apt-get update -y \
    && apt-get install msmtp -y
    
COPY msmtprc /etc/msmtprc
RUN chmod 600 /etc/msmtprc
RUN sed -i "s|EMAILDOMAIN|${EMAILDOMAIN} |g" /etc/msmtprc
RUN sed -i "s|ADMINEMAILSMTP|${ADMINEMAILSMTP} |g" /etc/msmtprc
RUN sed -i "s|ADMINEMAILPASSWD|${ADMINEMAILPASSWD} |g" /etc/msmtprc
RUN sed -i "s|ADMINEMAILSMTP|${ADMINEMAILSMTP} |g" /etc/msmtprc


RUN a2enmod rewrite
