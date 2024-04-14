FROM php:8.2-cli

# Set the working directory to /var/www/html
WORKDIR /var/www/html/

# Install the SQL server 
RUN apt-get update && apt install mariadb-server -y

# Copy all files from the github repo to the container
COPY . .

# Start the SQL server and execute the sql queries to create 
# database and tables
RUN service mariadb start && mariadb < schema.sql

# Remove unnecessary files
RUN rm Dockerfile README.md schema.sql

# Configure PHP needed extensions
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

RUN docker-php-ext-install pdo_mysql

EXPOSE 80

RUN echo "service mariadb start && php -S 0.0.0.0:80" > /init.sh
RUN chmod +x /init.sh

CMD ["/init.sh"]


