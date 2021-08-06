FROM php:8.0-fpm

RUN apt-get update -y && apt-get install -y curl apt-utils openssl zip  unzip nodejs vim npm

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY . /app

RUN composer install

CMD php artisan key:generate

CMD php artisan serve --host=0.0.0.0 --port=80


EXPOSE 8009