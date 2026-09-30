FROM php:8.2-cli-alpine

# 1 · Pasang dependensi sistem yang dibutuhkan ekstensi PHP
RUN apk add --no-cache $PHPIZE_DEPS libzip-dev sqlite-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# 2 · Salin composer dari image resmi composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 3 · Salin HANYA file dependency dulu — ini kunci caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# 4 · Baru salin seluruh kode aplikasi
COPY . .

# 5 · Selesaikan autoload setelah kode aplikasi ada
RUN composer dump-autoload --optimize

# 6 · Siapkan .env dan database SQLite di dalam image
RUN cp .env.example .env \
    && mkdir -p database \
    && touch database/database.sqlite \
    && sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=sqlite/' .env \
    && php artisan key:generate --force

EXPOSE 8000

# 7 · Jalankan migration, baru nyalakan server, tiap kali container start
CMD ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]