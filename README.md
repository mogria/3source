# 3 source

# Developer Installation

As a base for our docker setup this artical was a great help: [Dylan Lindgren on Laravel and Docker][docker]

* First download all the necessary docker containers

        % docker pull mogria/3source-data && \
          docker pull mogria/3source-composer && \
          docker pull mogria/3source-artisan && \
          docker pull dylanlindgren/docker-laravel-phpfpm && \
          docker pull dylanlindgren/docker-laravel-nginx && \
          docker pull dylanlindgren/docker-laravel-bower

* Create the necessary directories:

        % mkdir -p $HOME/Code/3source/logs

* Map the data container:

        % docker run --name 3source-data -v $HOME/Code/3source:/data:rw mogria/3source-data

  *Note:* On windows you need to separate the path after `-v` with semicolons (`;`) instead of colons (`:`)

* Setup an alias to run `composer` from the docker container:

        % SHELLCONFIG="$HOME/.zshrc" # you may use bash or someting else
        % echo 'alias 3source-composer="docker run --volumes-from 3source-data --rm mogria/3source-composer"' >> "$SHELLCONFIG"

* Do the same for `artisan`:

        % echo 'alias 3source-artisan="docker run --volumes-from 3source-data --rm mogria/3source-artisan"' >> "$SHELLCONFIG"
        % source "$SHELLCONFIG"
  
* Clone the git repository to the www directory

        % cd "$HOME/Code/source"
        % git clone https://github.com/mogria/3source www

* Go into the repo

        % cd www
    
* Update the dependencies

        % 3source-composer install

* Check if artisan works too

        % 3source-artisan

* Run the webserver:

        % ./start.sh

* That's it.

Whats useful is to have this command running on an other terminal to see when errors occur:

    % tail -f ../logs/error.log

You may need to adjust the permissions so laravel can not only access files but also write them:

    % chown -R $USER:www-data storage # may need sudo
    % chmod -R 775 storage
    % chown -R $USER:www-data bootstrap/cache # may need sudo
    % chmod -R 775 bootstrap/cache

The docker containers used will run under the www-data user.

Now go code!

[docker]: <http://dylanlindgren.com/docker-for-the-laravel-framework> "Dylan Lindgren, Docker for the Laravel Framework"
