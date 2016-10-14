FROM php:7.0-apache
#COPY . /var/www/html/

# Install PDO MySQL driver
# See https://github.com/docker-library/php/issues/62
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Workaround for write permission on write to MacOS X volumes
# See https://github.com/boot2docker/boot2docker/pull/534
RUN usermod -u 1000 www-data

# Enable Apache mod_rewrite
RUN a2enmod rewrite

#for rabbitMQ
# Install bcmath
RUN docker-php-ext-install bcmath

# date.timezone
RUN echo "date.timezone=UTC" > $PHP_INI_DIR/conf.d/timezone.ini

RUN chown -R www-data:www-data /var/www/html

RUN chmod 777 -R /var/www/html

#VOLUME /var/www/html/

EXPOSE 80