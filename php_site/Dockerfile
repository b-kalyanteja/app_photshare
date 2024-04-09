# Use the official PHP image as a base
FROM php:7.4-apache

# Install MySQLi extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy your PHP application files into the container
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Start Apache web server when the container starts
CMD ["apache2-foreground"]