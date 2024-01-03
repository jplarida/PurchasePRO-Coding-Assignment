# Use the official PHP image
FROM php:7.4-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the application files to the container
COPY . .

#permision settings to run healthcheck
RUN chmod +x /var/www/html/healthcheck.sh

# Expose port 80
EXPOSE 80

# Start the Apache web server
CMD ["apache2-foreground"]
