# Use official PHP with Apache
FROM php:8.2-apache

# Install system dependencies and Node.js 18
RUN apt-get update && apt-get install -y \
    curl unzip git libzip-dev zip \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_mysql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy all files
COPY . .

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Update Apache to serve from /public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf && \
    echo '<Directory /var/www/html/public>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>' >> /etc/apache2/apache2.conf

# Set environment variable
ENV APP_ENV=production

# Copy Composer from official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Laravel PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Build frontend assets
RUN npm install && npm run build && rm -rf node_modules

# Expose HTTP port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
