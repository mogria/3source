# 3 source


# Developer Installation

We used the docker containers as explained in this article: [docker]

[docker]: <http://dylanlindgren.com/docker-for-the-laravel-framework>

First install all the necessary docker containers:

    % docker pull dylanlindgren/docker-laravel-data && \
      docker pull dylanlindgren/docker-laravel-composer && \
      docker pull dylanlindgren/docker-laravel-artisan && \
      docker pull dylanlindgren/docker-laravel-phpfpm && \
      docker pull dylanlindgren/docker-laravel-nginx && \
      docker pull dylanlindgren/docker-laravel-bower

Create the necessary directories:

    % mkdir -p $HOME/Code/3source/logs

Map the data container:

    % docker run --name myapp-data -v $HOME/Code/3source:/data:rw dylanlindgren/docker-laravel-data  

Setup an alias to run `composer` from the docker container:
p

    % SHELLCONFIG="$HOME/.zshrc" # you may use bash or someting else
    % echo 'alias 3source-composer="docker run --privileged=true --volumes-from myapp-data --rm dylanlindgren/docker-laravel-composer"' >> "$SHELLCONFIG"

Do the same for `artisan`:

    % echo 'alias 3source-artisan="docker run --privileged=true --volumes-from myapp-data --rm dylanlindgren/docker-laravel-artisan"' >> "$SHELLCONFIG"
    % source "$SHELLCONFIG"

Then clone in the git repository to the www directory

    % git clone https://github.com/mogria/3source www

Go into the repo:

    % cd www
    
Update the dependencies:

    % 3source-composer update

Run the webserver:

    % ./start.sh

Whats useful is to have this command running on an other terminal to see when errors occur:

    % tail -f ../logs/error.log

You may need to adjust the permissions so laravel can not only access files but also write them:

    % chown -R $USER:www-data storage # may need sudo
    % chmod -R 775 storage
    % chown -R $USER:www-data bootstrap/cache # may need sudo
    % chmod -R 775 bootstrap/cache

Now go code!

