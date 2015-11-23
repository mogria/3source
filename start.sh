#!/bin/sh

SOURCE_DIR="$( cd "$(dirname "$0")" && pwd)"
VOLUME_ROOT="$( cd "$(dirname "$0")/.." && pwd)"

genpw() {
    tr -cd '[:alnum:]' < /dev/urandom | fold -w30 | head -n1
}

set_dotenv_var() {
    var="$1"
    value="$2"
    sed -i "s/\($var=\).*/\1$value/g" "$SOURCE_DIR/.env"
}

get_container_ip() {
    docker inspect --format '{{ .NetworkSettings.IPAddress }}' "$1"
}

# generate new password for mysql, and write it to .env
set_dotenv_var DB_PASSWORD "$(genpw)"

# load environment variables
source "$SOURCE_DIR/.env"

# Start the data container. Most of the time this is not necessary
docker run --name 3source-data -v "$VOLUME_ROOT:/data:rw" mogria/3source-data 

# stop and remove the containers that might have been
# started as a daemon before so we start from a clean slate
docker stop 3source-mysql 3source-php 3source-web
docker rm 3source-mysql 3source-php 3source-web

# run the database container
docker run --name 3source-mysql -d \
    -e "MYSQL_ROOT_PASSWORD=$DB_PASSWORD" \
    -e "MYSQL_DATABASE=$DB_DATABASE" \
    mysql
set_dotenv_var DB_HOST "$(get_container_ip 3source-mysql)"

# start the php backend
docker run --name 3source-php --volumes-from 3source-data -d --link 3source-mysql:db dylanlindgren/docker-laravel-phpfpm
# start the nginx webserver
docker run --name 3source-web --volumes-from 3source-data -p 80:80 --link 3source-php:fpm -d dylanlindgren/docker-laravel-nginx  
