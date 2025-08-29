# Usar la imagen base de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias (por ejemplo, mysqli)
# RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql

# Establecer el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Copiar todo el contenido desde el contexto del Dockerfile al directorio de trabajo en el contenedor
COPY . .
# RUN chown -R www-data:www-data /var/www/html

# Configurar Apache para que use el archivo .htaccess
RUN a2enmod rewrite \
 && sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
 && sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf



# -----------------

# Usar la imagen base de PHP con Apache
# FROM php:8.2-apache

# Instalar extensión PDO MySQL
# RUN docker-php-ext-install pdo_mysql

# Habilitar mod_rewrite y permitir .htaccess
# RUN a2enmod rewrite \
#  && sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
#  && sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Establecer directorio de trabajo
# WORKDIR /var/www/html

# Copiar archivos y dar permisos
# COPY . .
RUN chown -R www-data:www-data /var/www/html
