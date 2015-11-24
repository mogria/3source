# 3 source

# Developer Installation

As a base for our docker setup this artical was a great help: [Dylan Lindgren on Laravel and Docker][docker]

* Create the necessary directories:

        % mkdir -p $HOME/Code/3source/logs

* Clone the git repository to the www directory

        % cd "$HOME/Code/source"
        % git clone https://github.com/mogria/3source www

* Go into the repo

        % cd www

* Download all the necessary docker containers

        % ./update-docker-images.sh

* Setup development tools. To develop this project `artisan`, `composer`, `npm`, `gulp` and `bower` are required.  
  You can either create some aliases (Option 1), you can use [direnv] (Option 2, recommended), add the bin directory to your own path (Option 3, suboptimal), or do nothing and just type `bin/npm` if you want to use the tools.
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

    
* Update the dependencies

        % composer install
        % npm install
        % bower install

* Compile the CSS and javascript

        % gulp

* Check if the other works too:

        % artisan

* Run all the docker containers:

        % ./start.sh

Whats useful is to have this command running on an other terminal to see when errors occur:

    % tail -f ../logs/error.log

If you're modifying SASS files, run the following command so the files automatically get compiled:

    % gulp --watch

The docker containers used will run under the www-data user.

Now go code!

[docker]: <http://dylanlindgren.com/docker-for-the-laravel-framework> "Dylan Lindgren, Docker for the Laravel Framework"
[direnv]: <https://github.com/direnv/direnv> "direnv Repository"
