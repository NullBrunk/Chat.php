FROM php:8.2-cli

# Set the working directory to /var/www/html
WORKDIR /var/www/html/

# Copy all files from the github repo to the container
COPY . .

RUN mv schema.sql wait-for-mysql.sh /

# Configure PHP needed extensions (dependencies)
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN docker-php-ext-install pdo_mysql

# Install the mariadb client to run the migration and clean the apt cache
RUN apt update \
	&& apt install mariadb-client -y \
	&& apt clean \
	&& rm -rf /var/lib/apt/lists

# Expose the HTTP port
EXPOSE 80

# Ensure that the MySQL container is started, launch migration, and launch the HTTP server
RUN echo "/wait-for-mysql.sh \nphp -S 0.0.0.0:80" > /init.sh

RUN chmod +x /wait-for-mysql.sh && chmod +x /init.sh

CMD ["/init.sh"]


