FROM php:7.4.24-fpm-bullseye

ARG TZ=UTC
ARG PHPGROUP
ARG PHPUSER

ENV DEBIAN_FRONTEND noninteractive

ENV TZ=${TZ} PHPGROUP=${PHPGROUP} PHPUSER=${PHPUSER}

# Change container timezone
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Add group & user php
RUN adduser -g ${PHPGROUP} -s /bin/sh -D ${PHPUSER}; exit 0

RUN mkdir -p /var/www/app

WORKDIR /var/www/app

COPY php/php.ini /usr/local/etc/php/php.ini

COPY php/php-fpm.conf /usr/local/etc/php-fpm.conf

COPY php/www.conf /usr/local/etc/php-fpm.d/www.conf

COPY php/*.sh /scripts/

RUN chmod a+x /scripts/*.sh

RUN sed -i "s/user = www-data/user = ${PHPUSER}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${PHPGROUP}/g" /usr/local/etc/php-fpm.d/www.conf

# Install extensions using the helper script provided by the base image
RUN docker-php-ext-install pdo pdo_mysql

RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/5.3.4.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis

EXPOSE 9000

ENTRYPOINT ["/scripts/entrypoint.sh"]

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]

