# Use uma imagem base do PHP com Apache
FROM php:8.0-apache

# Instalar extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copiar o código da aplicação para o diretório raiz do Apache
COPY . /var/www/html/

# Configurar o Apache
RUN a2enmod rewrite


