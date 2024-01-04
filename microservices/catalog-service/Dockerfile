# Use the official PHP image
FROM php:8.1-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the application files to the container
COPY . .

# Install dependencies (you may need to adjust this based on your Laravel version)
RUN apt-get update && \
apt-get install -y libzip-dev zip && \
docker-php-ext-configure zip && \
docker-php-ext-install zip pdo_mysql && \
apt-get install -y mariadb-client && \
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
composer install --no-dev --optimize-autoloader

# Set proper permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

#permision settings to run healthcheck
RUN chmod +x /var/www/html/healthcheck.sh

# Enable Apache modules
RUN a2enmod rewrite

# Configure Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf


# Expose port 80
EXPOSE 80

# Start the Apache web server
CMD ["apache2-foreground"]
