FROM php:8.2-apache

# Instalamos los drivers de Postgres
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Copiamos tus archivos al servidor
COPY . /var/www/html/

# Damos permisos
RUN chown -R www-data:www-data /var/www/html