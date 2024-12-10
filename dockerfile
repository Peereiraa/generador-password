# Usar una imagen base de Nginx
FROM php:8.2-apache

# Copiar el contenido del frontend a la carpeta predeterminada de Nginx
COPY . /var/www/html

# Exponer el puerto 80
EXPOSE 80