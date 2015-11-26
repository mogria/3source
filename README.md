# 3 source

## Developer Installation

As a base for our docker setup this artical was a great help: [Dylan Lindgren on Laravel and Docker][docker]

* Create the necessary directories:

        % mkdir -p $HOME/Code/3source/logs

  The 3source directory is shared with all the docker containers. The web server then uses the `logs` directory to write logs.

* Clone the git repository to the www directory

        % cd "$HOME/Code/source"
        % git clone https://github.com/mogria/3source www

  It is important that you call it `www` because it's the web servers root and all the docker containers are configured this way. For example `artisan` stricly runs with `www` as it's working directory.

* Go into the repo

        % cd www

* Download all the necessary docker containers

        % ./update-docker-images.sh

  This script is simply a collection of `docker pull` commands. The following images are being downloaded:

    * [mogria/3source-base](https://github.com/mogria/3source-base) - A simple base image, with a few scripts preinstalled to handle permissions.
    * [mogria/3source-data](https://github.com/mogria/3source-data) - Does nothing. Is used to share the `3source` folder with the other docker containers.
    * [mogria/3source-phpcli](https://github.com/mogria/3source-phpcli) - Provides `php` as command line program. Has some PHP extensions installed. Based on `3source-base`.
    * [mogria/3source-artisan](https://github.com/mogria/3source-artisan) - Provides `artisan` as command line program. Based on `3source-phpcli`.
    * [mogria/3source-composer](https://github.com/mogria/3source-composer) - Provides `composer` and `phpunit` as command line programs. Based on `3source-phpcli`.
    * [mogria/3source-npm](https://github.com/mogria/3source-npm) - Provides `npm`, `node` `bower` and `gulp` command line programs. Based on `node` docker container.
    * [dylanlindgren/docker-laravel-nginx](https://github.com/dylanlindgren/docker-laravel-nginx) - Provides an nginx web server.
    * [dylanlindgren/docker-laravel-phpfpm](https://github.com/dylanlindgren/docker-laravel-phpfpm) - Provides the PHP backend for the nginx web server.
    * [mysql](https://hub.docker.com/_/mysql) - The mysql database.

* Setup development tools. To develop this project `artisan`, `composer`, `npm`, `gulp` and `bower` are required.  
  You can either create some aliases (Option 1), you can use the [direnv] project (Option 2, recommended), add the bin directory to your own path (Option 3, suboptimal), or do nothing and just type `bin/` before the tool name you want to use (Option 4, easiest).
   * *Option 1*: Setup aliases

            % SOURCE_DIR="$PWD" # the www directory
            % SHELLCONFIG="$HOME/.zshrc" # you may use bash or someting else
            % echo 'alias 3source-composer="$SOURCE_DIR/bin/composer"' >> "$SHELLCONFIG"
            % echo 'alias 3source-artisan="$SOURCE_DIR/bin/artisan"' >> "$SHELLCONFIG"
            % echo 'alias 3source-npm="$SOURCE_DIR/bin/npm"' >> "$SHELLCONFIG"
            % echo 'alias 3source-bower="$SOURCE_DIR/bin/bower"' >> "$SHELLCONFIG"
            % echo 'alias 3source-gulp="$SOURCE_DIR/bin/gulp"' >> "$SHELLCONFIG"
            % source "$SHELLCONFIG"

     Warning you need to use your aliased commands for the following instructions!
   * *Option 2*: Setup [direnv] *(recommended)*
     * Go to their [repository][direnv]
     * Install the tool
     * type `direnv allow .` inside the `www` directory.
     * All the tools are now available if you are inside the `www` directory.
   * *Option 3*: Add `bin` to your path. *(not recommended)*
     This Option may not be suitable if you already have some of the tools installed. Use Option 1 in this case.

            % SOURCE_DIR="$PWD" # the www directory
            % SHELLCONFIG="$HOME/.zshrc" # you may use bash or someting else
            % echo 'export PATH="$PATH:$SOURCE_DIR/bin"' >> "$SHELLCONFIG"

   * *Option 4*: Just type the path. This needs no setup and just works. Just run the programs like if you are inside the `www` directory:

            % bin/artisan
            % bin/npm
            % bin/composer
            # bin/<whatever>
    
* Update the dependencies (assuming you chose *Option 2* in the previous step, if you didn't you need change up the commands slightly)

        % composer install
        % npm install
        % bower install

* Compile the CSS and javascript

        % gulp

* Check if the other works too:

        % artisan

* Run all the docker containers:

        % ./start.sh
  
  By default the web server listens on `0.0.0.0:80`. You can specify the bind
  address and the port by setting the environment variables `WEB_PORT` and
  `WEB_BIND_ADDRESS`. For example:
        
        % WEB_BIND_ADDRESS=127.0.0.1 WEB_PORT=80 ./start.sh

## Developer tips

Whats useful is to have this command running on an other terminal to see when errors occur:

    % tail -f ../logs/error.log

If you're modifying SASS files, run the following command so the files automatically get compiled:

    % gulp --watch


### Permissions

All programs in the `3source-*` containers will run under the same user as you execute the files in the `bin` directory. This may be problematic if your `uid` is already used inside the docker containers. Because of this all the files created will automatically set you as the owner. The umask is also set to `002`. That means the group automatically has write permissions. The `start.sh` script will change the group of directories like `bootstrap/cache` and `storage` because the phpfpm runs under the `www-data` user and PHP needs to write to these folders. In most cases the permissions should be properly handled by the docker containers and the `start.sh` script. If you have any problems with this, you now know how the setup is configured. If you can't fix it create an issue and let us know.

[docker]: <http://dylanlindgren.com/docker-for-the-laravel-framework> "Dylan Lindgren, Docker for the Laravel Framework"
[direnv]: <https://github.com/direnv/direnv> "direnv Repository"
