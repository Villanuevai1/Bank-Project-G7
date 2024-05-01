#Uses the official PHP 7.4-apache image
FROM php:7.4-apache

# Install the mysqli extension
RUN docker-php-ext-install mysqli

# Adds ServerName to apache2.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Sets index as the default file
RUN echo 'DirectoryIndex index.php' > /etc/apache2/conf-available/directory-index.conf
# Enables the configuration
RUN a2enconf directory-index

# Copies the contents of the app to the image
COPY . /var/www/html/
# Change ownership of all files in /var/www/html to www-data user and group
RUN chown -R www-data:www-data /var/www/html

# Update the package list and install wget
RUN apt-get update && apt-get install -y wget \
&& wget https://github.com/jwilder/dockerize/releases/download/v0.6.1/dockerize-linux-amd64-v0.6.1.tar.gz \
&& tar -C /usr/local/bin -xzvf dockerize-linux-amd64-v0.6.1.tar.gz \
&& rm dockerize-linux-amd64-v0.6.1.tar.gz

# Informs docker the container is listening at port 80
EXPOSE 80

