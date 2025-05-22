FROM php:8.1.9-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libfreetype6-dev \
    libxml2-dev \
    libonig-dev \
    libcurl4-openssl-dev \
    libgmp-dev \
    libmagickwand-dev \
    git \
    && docker-php-ext-configure gd --with-freetype --with-webp --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install exif \
    && docker-php-ext-install intl \
    && docker-php-ext-install curl \
    && docker-php-ext-install gmp \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./php.ini /usr/local/etc/php/php.ini

RUN groupadd -g 1000 dvoreckii && \
    useradd -u 1000 -g dvoreckii -m dvoreckii && \
    chown -R dvoreckii:dvoreckii /var/www

COPY . .

WORKDIR /var/www

USER dvoreckii

EXPOSE 9000

CMD ["php-fpm"]
