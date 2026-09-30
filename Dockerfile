FROM php:8.3-cli-alpine

# 1 · Pasang dependensi sistem yang dibutuhkan ekstensi PHP
RUN apk add --no-cache $PHPIZE_DEPS libzip-dev sqlite-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# 2 · Salin composer dari image resmi composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 3 · Tentukan direktori kerja
WORKDIR /var/www/html

# 4 · Salin HANYA file dependency dulu, ini kunci caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# 5 · Baru salin seluruh kode aplikasi
COPY . .

# 6 · Buat folder yang dibutuhkan Laravel (tidak ikut tersalin dari repo)
RUN mkdir -p storage/framework/cache/data \
             storage/framework/sessions \
             storage/framework/views \
             storage/logs \
             bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# 7 · Selesaikan autoload setelah kode aplikasi ada
RUN composer dump-autoload --optimize

# 8 · Siapkan .env dan database SQLite di dalam image
RUN cp .env.example .env \
    && mkdir -p database \
    && touch database/database.sqlite \
    && sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=sqlite/' .env \
    && php artisan key:generate --force

EXPOSE 8000

# 9 · Jalankan migration, baru nyalakan server, tiap kali container start
CMD ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]