# Use a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Habilite o módulo de reescrita do Apache
RUN a2enmod rewrite

# Copie os arquivos da aplicação do diretório local para o diretório padrão do Apache no contêiner
COPY . /var/www/html/

# Defina as permissões corretas para o diretório de trabalho
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Exponha a porta 80
EXPOSE 80

# Inicie o Apache em primeiro plano
CMD ["apache2-foreground"]