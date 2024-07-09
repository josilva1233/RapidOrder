# Use uma imagem base do Nginx
FROM nginx:latest

# Copie os arquivos do aplicativo para o diretório web do Nginx
COPY . /usr/share/nginx/html

# Exponha a porta onde o Nginx estará rodando
EXPOSE 80

# O comando CMD define o comando a ser executado quando o contêiner for iniciado.
CMD ["nginx", "-g", "daemon off;"]

