FROM php:7.4
ARG DOCKER_HOST_IP=172.17.0.1
ARG IDE_KEY=app
ARG SERVER_NAME=app
ENV XDEBUG_CONFIG="idekey=${IDE_KEY} remote_enable=1 remote_host=${DOCKER_HOST_IP}"
ENV PHP_IDE_CONFIG="serverName=${SERVER_NAME}"
RUN apt-get update \
    && apt-get install -y git unzip libpq-dev \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install pdo_mysql \
    && curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet \
COPY config/php.ini /usr/local/etc/php/
WORKDIR /app
