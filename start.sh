#!/bin/sh
docker stop 3source-web 3source-php
docker rm 3source-web 3source-php
docker run --privileged=true --name 3source-php --volumes-from 3source-data -d dylanlindgren/docker-laravel-phpfpm

docker run --privileged=true --name 3source-web --volumes-from 3source-data -p 80:80 --link 3source-php:fpm -d dylanlindgren/docker-laravel-nginx  
