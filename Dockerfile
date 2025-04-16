# Usar una imagen base de PHP con Apache
FROM php:7.4-apache

# Crear el directorio para las sesiones de PHP
RUN mkdir -p /var/www/html/sessions
RUN chown -R www-data:www-data /var/www/html/sessions

# para los captcha
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd


# Copiar el código de la aplicación al contenedor
COPY . /var/www/html

# Copiar la fuente TTF al contenedor
COPY fonts/arial.ttf /usr/share/fonts/arial.ttf    
# Configurar el DocumentRoot de Apache
RUN sed -i 's#/var/www/html#/var/www/html/html#g' /etc/apache2/sites-available/000-default.conf

# Instalar las extensiones de PHP necesarias
RUN docker-php-ext-install mysqli pdo_mysql

# Exponer el puerto de Apache
EXPOSE 80

# Copiar el contenido del directorio html al contenedor
COPY html /var/www/html/html
