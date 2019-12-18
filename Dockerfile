FROM php:7.3-apache

# COPY . /var/www/html/

# RUN chmod -Rv 777 /var/www/html/storage
RUN apt-get update && apt-get install -y git zlib1g-dev libzip-dev

RUN docker-php-ext-install pdo pdo_mysql zip

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite

# docker build -t <image_tag> . && docker run -p 8082:80 -v /path/to/project:/var/www/html --name laravel <image_tag>
