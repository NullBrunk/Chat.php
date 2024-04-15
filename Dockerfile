FROM php:8.2-cli

# Set the working directory to /var/www/html
WORKDIR /var/www/html/

# Copy all files from the github repo to the container
COPY . .

# Remove unnecessary files
RUN rm Dockerfile docker-compose.yml README.md 

# Move the sql schema file
RUN mv schema.sql /
# Configure PHP needed extensions
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN docker-php-ext-install pdo_mysql

# Install mariadb client
RUN apt update && apt install mariadb-client -y

# Expose the HTTP port
EXPOSE 80

# Create an init script and run it

# Ensure that the MySQL container is started
RUN echo "sleep 20" > /init.sh 
# Do the "migration"
RUN echo "mariadb -hmysql -uroot -proot < /schema.sql" >> /init.sh 
# Launch the HTTP server
RUN echo "php -S 0.0.0.0:80" >> /init.sh

RUN chmod +x /init.sh

CMD ["/init.sh"]


