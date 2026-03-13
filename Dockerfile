# Use PHP 8.2 with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP extensions needed for Laravel
RUN apt-get update && apt-get install -y \
    zip unzip git libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Expose Apache port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]