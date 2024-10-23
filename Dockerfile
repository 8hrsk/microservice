FROM php:8.0-apache as base

# Install and enable mysqli
RUN docker-php-ext-install mysqli

# Install xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Configure xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/xdebug.ini

COPY ./src /var/www/html
EXPOSE 8089