FROM php:8.3-cli

# Dependencias sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpq-dev \
    nodejs \
    npm

# PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Carpeta app
WORKDIR /app

# Copiar proyecto
COPY . .

# Instalar PHP
RUN composer install --no-dev --optimize-autoloader

# Frontend
RUN npm install
RUN npm run build

# Permisos Laravel
RUN chmod -R 775 storage bootstrap/cache

# Puerto Render
EXPOSE 10000

# Start
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT
