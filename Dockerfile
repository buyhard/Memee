FROM node:22-bookworm AS node-build
WORKDIR /app/
COPY . .
RUN npm install && npm run build

FROM composer:2.9 AS composer-build
WORKDIR /app/
COPY ./composer.json ./
COPY ./composer.lock ./
RUN docker-php-ext-install bcmath
RUN composer install --no-dev --no-scripts --optimize-autoloader

FROM php:8.4-apache
WORKDIR /var/www/html/
COPY . .
COPY --from=node-build /app/public/build /var/www/html/public/build
COPY --from=composer-build /app/vendor /var/www/html/vendor

RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-install pdo_pgsql

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
RUN chmod +x /var/www/html/setup.sh

CMD ["./setup.sh"]