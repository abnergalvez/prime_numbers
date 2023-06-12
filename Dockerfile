
FROM php:8.1-apache
WORKDIR /var/www/html
COPY . /var/www/html
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN mkdir -p bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# install composer
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# install dependencies
RUN composer install --no-interaction
EXPOSE 80
CMD ["apache2-foreground"]
