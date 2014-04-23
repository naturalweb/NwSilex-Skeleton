NwSilex-Skeleton
================

Introduction
------------
Esta aplicação destina-se a ser usado como um ponto de partida para quem quer usar o framework Silex, com o pacote NwSilex.

Installation
------------

Using Composer (recommended)
----------------------------
The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

    curl -s https://getcomposer.org/installer | php --
    php composer.phar create-project -sdev naturalweb/nwsilex-skeleton path/to/install

Alternately, clone the repository and manually invoke `composer` using the shipped
`composer.phar`:

    cd my/project/dir
    git clone git://github.com/naturalweb/NwSilex-Skeleton.git
    cd NwSilex-Skeleton
    php composer.phar self-update
    php composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)

Another alternative for downloading the project is to grab it via `curl`, and
then pass it to `tar`:

    cd my/project/dir
    curl -#L https://github.com/naturalweb/NwSilex-Skeleton/tarball/master | tar xz --strip-components=1

You would then invoke `composer` to install dependencies per the previous
example.

