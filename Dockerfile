FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    curl \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN npm install
RUN npm run build

CMD ["sh", "-c", "php artisan migrate --force && php -S 0.0.0.0:$PORT public/index.php"]
