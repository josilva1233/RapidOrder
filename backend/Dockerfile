# Use a imagem PHP oficial com Apache
FROM php:7.4-apache

# Instale dependências e extensões PHP necessárias
RUN apt-get update && \
    apt-get install -y \
        libpq-dev \
        && \
    docker-php-ext-install \
        pdo_mysql \
        mysqli \
        && \
    a2enmod rewrite

# Copie os arquivos da aplicação para o diretório web do Apache
COPY . /var/www/html

# Configure o Apache para permitir mod_rewrite
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Exponha a porta 80 do contêiner
EXPOSE 80

# Comando padrão para iniciar o Apache ao iniciar o contêiner
CMD ["apache2-foreground"]

