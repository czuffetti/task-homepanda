FROM php:7-fpm
RUN rm /etc/apt/preferences.d/no-debian-php \
  && apt-get update -y \
  && apt-get install -y \
  libxml2-dev \
  php-soap \
  libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev libfreetype6-dev zlib1g-dev libzip-dev libonig-dev \
  && pecl install xdebug-2.9.8 \
  && apt-get clean -y \
  && docker-php-ext-install soap \
  && docker-php-ext-install mysqli \
  && docker-php-ext-enable xdebug \
  && docker-php-ext-install zip \
  && docker-php-ext-configure gd --with-webp --with-jpeg --with-xpm --with-freetype \
  && docker-php-ext-install gd \
  && echo "xdebug.remote_enable=off" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo "xdebug.remote_host = host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo "php_admin_value[error_reporting] = ~E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT & ~E_DEPRECATED">>/usr/local/etc/php-fpm.d/www.conf