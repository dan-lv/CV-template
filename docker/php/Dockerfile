FROM node:15.12.0-alpine as builder
RUN apk update && apk add --no-cache --virtual .gyp python make g++ && \
    apk add yarn
COPY . /app
WORKDIR /app
RUN yarn install && yarn prod

###############################
FROM php:7.4-fpm-alpine3.13

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY ./docker/php/docker-entrypoint.sh /docker-entrypoint.sh
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

RUN apk add --update \
        libzip-dev \
        zip \
        openssh

RUN docker-php-ext-install \
        mysqli \
        pdo \
        pdo_mysql \
        zip

ARG DOCKER_UID
ARG DOCKER_GID
RUN if [ ${DOCKER_UID:-0} -ne 0 ] && [ ${DOCKER_GID:-0} -ne 0 ]; then \
    deluser www-data &&\
    if getent group www-data ; then delgroup www-data; fi &&\
    addgroup -g ${DOCKER_GID} www-data &&\
    adduser -u ${DOCKER_UID} -G www-data www-data --disabled-password &&\
    install -d -m 0755 -o www-data -g www-data /home/www-data \
;fi

COPY --from=composer:2.1.2 /usr/bin/composer /usr/local/bin/composer
COPY . /app

WORKDIR /app
RUN composer install
ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz

COPY --from=builder /app/public public

RUN chown -R www-data:www-data /app
