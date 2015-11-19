#!/bin/sh

VOLUME_ROOT="$( cd "$(dirname "$0")/.." && pwd)"
echo "v: $VOLUME_ROOT"

docker run --name 3source-data -v "$VOLUME_ROOT:/data:rw" mogria/3source-data 

docker stop 3source-mysql 3source-php 3source-web
docker rm 3source-mysql 3source-php 3source-web

docker run --name 3source-mysql -d mysql
docker run --name 3source-php --volumes-from 3source-data -d --link 3source-mysql:db dylanlindgren/docker-laravel-phpfpm
docker run --name 3source-web --volumes-from 3source-data -p 80:80 --link 3source-php:fpm -d dylanlindgren/docker-laravel-nginx  
