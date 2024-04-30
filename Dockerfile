FROM php:7.4-apache

RUN docker-php-ext-install mysqli

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf


RUN echo 'DirectoryIndex index.php' > /etc/apache2/conf-available/directory-index.conf
RUN a2enconf directory-index

COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

RUN apt-get update && apt-get install -y wget \
&& wget https://github.com/jwilder/dockerize/releases/download/v0.6.1/dockerize-linux-amd64-v0.6.1.tar.gz \
&& tar -C /usr/local/bin -xzvf dockerize-linux-amd64-v0.6.1.tar.gz \
&& rm dockerize-linux-amd64-v0.6.1.tar.gz


EXPOSE 80

