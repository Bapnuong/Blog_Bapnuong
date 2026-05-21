FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    nodejs \
    npm

# Install PHP extensions
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies
RUN npm install

# Build Vite assets
RUN npm run build

# Create Laravel storage folders
RUN mkdir -p storage/framework/views \
    storage/framework/cache \
    storage/framework/sessions \
    storage/logs

# Laravel optimize
RUN php artisan optimize:clear
RUN php artisan optimize

RUN echo "upload_max_filesize=64M" >> /usr/local/etc/php/conf.d/uploads.ini
RUN echo "post_max_size=64M" >> /usr/local/etc/php/conf.d/uploads.ini

# Expose Render port
EXPOSE 10000


# Start Laravel server
CMD ["sh", "-c", "\
php artisan config:clear && \
php artisan cache:clear && \
php artisan view:clear && \
php artisan route:clear && \
php artisan storage:link || true && \
php artisan migrate --force && \
php artisan serve --host=0.0.0.0 --port=$PORT \
"]
