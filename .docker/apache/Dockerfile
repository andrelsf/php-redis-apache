FROM    php:7.2-apache

ENV     APP_DIR=/usr/src/app/

RUN     apt-get update \
        && pecl install -o -f redis \
        && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
        && mkdir -p ${APP_DIR}

ADD     ./app.default.conf /etc/apache2/sites-enabled/000-default.conf

EXPOSE  80

WORKDIR /usr/src/app/