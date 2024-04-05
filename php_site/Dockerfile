# Use the official PHP image from Docker Hub
FROM php:latest

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the contents of your local directory into the container
COPY . .

# Expose port 80 to allow incoming traffic
EXPOSE 80

# Start PHP's built-in web server
CMD ["php", "-S", "0.0.0.0:80"]
