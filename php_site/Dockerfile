# Use PHP Apache image
FROM php:apache

# Copy all files from root folder into the container
COPY . /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache service
CMD ["apache2-foreground"]
