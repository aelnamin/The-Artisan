# Use PHP 8.2 + Apache
FROM php:8.2-apache

WORKDIR /var/www/html

# Install PHP extensions for Laravel
RUN apt-get update && apt-get install -y \
    zip unzip git libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php \
    -- --install-dir=/usr/local/bin --filename=composer

# Copy project files
COPY . .

# Expose Apache port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]