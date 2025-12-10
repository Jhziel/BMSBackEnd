FROM php:8.3 as php

RUN apt-get update -y
RUN apt-get install -y unzip libcurl4-openssl-dev libicu-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath intl

WORKDIR /var/www/html

COPY . .

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ADD https://github.com/ufoscout/docker-compose-wait/releases/download/2.11.0/wait /wait
RUN chmod +x /wait

COPY docker/entry-point.sh /usr/local/bin/entry-point.sh
RUN chmod +x /usr/local/bin/entry-point.sh

ENV WAIT_HOSTS=database:3306
ENV WAIT_TIMEOUT=60
ENV PORT=8000
ENTRYPOINT [ "docker/entry-point.sh" ]