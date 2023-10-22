FROM php:fpm
RUN apt-get update && apt-get install -y \
                        git \
                        libsodium-dev \
                        libzip-dev \
                        libpq-dev \
                        zip \
                        nodejs \
                        npm

RUN docker-php-ext-install opcache \
    bcmath \
    opcache \
    pcntl \
    sockets \
    zip

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && ln -s $(composer config --global home) /root/composer

RUN unlink /etc/localtime \
    && ln -s /usr/share/zoneinfo/Europe/Moscow /etc/localtime
WORKDIR /src/src

CMD ["php-fpm"]