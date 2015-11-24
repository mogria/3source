#!/bin/sh

docker pull mogria/3source-data && \
docker pull mogria/3source-base && \
docker pull mogria/3source-phpcli && \
docker pull mogria/3source-artisan && \
docker pull mogria/3source-composer && \
docker pull mogria/3source-npm && \
docker pull dylanlindgren/docker-laravel-phpfpm && \
docker pull dylanlindgren/docker-laravel-nginx && \
docker pull mysql
