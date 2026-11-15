# Servidor de aplicación: PHP con Apache
FROM php:8.3-apache

# Extensión de PHP necesaria para conectarse a MySQL
RUN docker-php-ext-install pdo_mysql
