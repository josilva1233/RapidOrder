# Use a imagem base do PHP
FROM php:7.4-cli

# Define o diretório de trabalho dentro do contêiner
WORKDIR /app

# Copia os arquivos do seu projeto para o contêiner
COPY . .

# Comando para iniciar o servidor PHP embutido (substitua pelo seu comando de execução)
CMD ["php", "-S", "0.0.0.0:8000"]
