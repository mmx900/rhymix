FROM php:7.2-apache
RUN a2enmod rewrite
RUN apt-get update \
    && apt-get -y --no-install-recommends install libpng-dev \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
