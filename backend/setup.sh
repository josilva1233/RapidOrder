#!/bin/bash

# Exibir uma mensagem de início
echo "Iniciando o setup da aplicação PHP pura..."

# Verificar se o Composer está instalado
if ! command -v composer &> /dev/null
then
    echo "Composer não está instalado. Por favor, instale o Composer e tente novamente."
    exit 1
fi

# Instalar dependências com o Composer
echo "Instalando dependências com o Composer..."
composer install
read -p "Pressione Enter para continuar após verificar se as dependências foram instaladas corretamente..."

# Configurar o arquivo de ambiente
if [ ! -f .env ]; then
    echo "Configurando o arquivo de ambiente..."
    cp .env.example .env
fi
read -p "Pressione Enter para continuar após verificar o arquivo de ambiente..."

# Configurar o banco de dados (MySQL como exemplo)
DB_NAME="rapidorder"
DB_USER="root"
DB_PASS=""
DB_HOST="localhost"

# Criar o banco de dados
echo "Criando o banco de dados..."
mysql -u "$DB_USER" -p"$DB_PASS" -e "CREATE DATABASE IF NOT EXISTS \`$DB_NAME\`;" || { echo "Erro ao criar o banco de dados"; exit 1; }
read -p "Pressione Enter para continuar após verificar a criação do banco de dados..."

# Executar migrações do banco de dados (assumindo um script SQL em migrations.sql)
if [ -f migrations.sql ]; then
    echo "Executando migrações do banco de dados..."
    mysql -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" < migrations.sql || { echo "Erro ao executar migrações"; exit 1; }
else
    echo "Arquivo migrations.sql não encontrado, pulando migrações."
fi
read -p "Pressione Enter para continuar após verificar a execução das migrações..."

# Populando o banco de dados com dados iniciais (assumindo um script SQL em seeds.sql)
#if [ -f seeds.sql ]; then
#    echo "Populando o banco de dados..."
#    mysql -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" < seeds.sql || { echo "Erro ao popular o banco de dados"; exit 1; }
#else
#    echo "Arquivo seeds.sql não encontrado, pulando população do banco de dados."
#fi
#read -p "Pressione Enter para continuar após verificar a população do banco de dados..."

# Exibir uma mensagem de conclusão
echo "Setup completo!"
read -p "Pressione Enter para sair..."


