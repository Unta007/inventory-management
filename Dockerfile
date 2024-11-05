
FROM php:8.1-apache 

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY . .

EXPOSE 80

CMD ["apache2-foreground"]
