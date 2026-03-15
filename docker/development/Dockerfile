# FROM --platform=$BUILDPLATFORM node AS static_builder
#     WORKDIR /var/www/html
#     COPY . /var/www/html
#     RUN yarn && yarn build

FROM serversideup/php:8.4-fpm-nginx AS base

USER root

RUN apt-get update && apt-get install -y --no-install-recommends sqlite3 \
    && rm -rf /var/lib/apt/lists/*

RUN install-php-extensions \
    exif \
    pgsql \
    sqlite3 \
    imagick \
    mbstring \
    gd \
    xml \
    zip \
    redis \
    bcmath \
    intl \
    curl

FROM base AS development

ARG UID=1000
ARG GID=1000

ENV PUID=${UID}
ENV PGID=${GID}
