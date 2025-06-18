FROM php:8.2-apache

# Instala extensión para PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copia todos los archivos al servidor Apache
COPY . /var/www/html/

# Cambia permisos (opcional pero recomendado)
RUN chown -R www-data:www-data /var/www/html

# Habilita mod_rewrite (por si usas .htaccess en el futuro)
RUN a2enmod rewrite
