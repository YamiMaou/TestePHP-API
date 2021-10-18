FROM php:7.4.0-fpm-alpine
RUN apk add --no-cache openssl bash nodejs npm postgresql-dev
RUN docker-php-ext-install bcmath pdo pdo_pgsql

WORKDIR /var/www

RUN rm -rf /var/www/html
RUN ln -s public html


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . /var/www

RUN chmod -R 777 /var/www/storage

RUN composer update

EXPOSE 8000

ENTRYPOINT [ "php-fpm" ]