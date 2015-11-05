#!/bin/sh
docker run --privileged=true --name 3source-php --volumes-from 3source-data -d dylanlindgren/docker-laravel-phpfpm

docker run --privileged=true --name 3source-web --volumes-from 3source-data -p 80:80 --link 3source-php:fpm -d dylanlindgren/docker-laravel-nginx  
