FROM php:7.4.7-fpm

RUN apt-get update && apt-get install --no-install-recommends -y unzip supervisor autoconf build-essential libpng-dev libpq-dev libxml2-dev libonig-dev libzip-dev nginx && pecl install -o -f mongodb redis && rm -rf /tmp/pear && docker-php-ext-install bcmath ctype gd json mbstring pdo pdo_pgsql soap tokenizer xml zip && docker-php-ext-enable redis && apt-get remove -y autoconf build-essential libpng-dev libpq-dev libxml2-dev libonig-dev libzip-dev && apt-get clean && rm -rf /var/lib/apt/lists/*
RUN pecl docker-php-ext-enable redis
RUN pecl docker-php-ext-enable mongodb

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY www.conf /usr/local/etc/php-fpm.d/www.conf
COPY nginx.conf /etc/nginx/nginx.conf
COPY php.ini /usr/local/etc/php/conf.d/php.override.ini
COPY listener.php /listener.php
COPY entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh && chown www-data: -R /var/www
WORKDIR /var/www/html
COPY --chown=www-data:www-data . .
EXPOSE 80
ENTRYPOINT ["/entrypoint.sh"]
