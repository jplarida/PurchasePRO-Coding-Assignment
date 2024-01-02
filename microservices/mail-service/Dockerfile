# Use the official PHP image
FROM php:7.4-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the application files to the container
COPY . .

# Expose port 80
EXPOSE 80

# Start the Apache web server
CMD ["apache2-foreground"]
