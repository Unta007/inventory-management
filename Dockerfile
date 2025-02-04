# Use the official PHP 8.1 FPM image as the base
FROM php:8.1-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql exif \
    && docker-php-ext-enable exif

# Set the working directory
WORKDIR /var/www

# Copy application files
COPY . .

# Change ownership of the application files
RUN chown -R www-data:www-data /var/www

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist

# Change ownership of storage and cache directories
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Add safe directory for Git
RUN git config --global --add safe.directory /var/www

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Install npm dependencies
RUN npm install

# Build assets (optional, can be run in a separate command)
RUN npm run build

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
