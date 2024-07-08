#!/bin/bash

# Exibir uma mensagem de início
echo "Iniciando o setup da aplicação PHP pura..."

# Verificar se o Composer está instalado
if ! command -v composer &> /dev/null
then
    echo "Composer não está instalado. Por favor, instale o Composer e tente novamente."
    exit
fi

# Instalar dependências com o Composer
echo "Instalando dependências com o Composer..."
composer install

# Configurar o arquivo de ambiente
echo "Configurando o arquivo de ambiente..."
cp .env.example .env

# Configurar o banco de dados (MySQL como exemplo)
DB_NAME="apiRapidOrder"
DB_USER="root"
DB_PASS=""
DB_HOST="localhost"

echo "Criando o banco de dados..."
mysql -u $DB_USER -p$DB_PASS -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;"

# Executar migrações do banco de dados (assumindo um script SQL em migrations.sql)
echo "Executando migrações do banco de dados..."
mysql -u $DB_USER -p$DB_PASS $DB_NAME < migrations.sql

# Populando o banco de dados com dados iniciais (assumindo um script SQL em seeds.sql)
#echo "Populando o banco de dados..."
#mysql -u $DB_USER -p$DB_PASS $DB_NAME < seeds.sql

# Exibir uma mensagem de conclusão
echo "Setup completo!"
read -p "Pressione Enter para continuar..."
