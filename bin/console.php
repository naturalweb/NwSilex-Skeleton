<?php

umask(0000);

define('ROOT_PATH', dirname(__DIR__));
define('PUBLIC_PATH', ROOT_PATH . '/public');
define('APP_PATH', ROOT_PATH . '/app');

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../app/boot/start.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

$console = new Application('NwSilex', '0.1');

$console
    ->register('assetic:dump')
    ->setDescription('Dumps all assets to the filesystem')
    ->setCode(function( InputInterface $input, OutputInterface $output ) use ($app) {
        $dumper = $app['assetic.dumper'];
        if( isset($app['twig']) ) {
            $dumper->addTwigAssets();
        }
        $dumper->dumpAssets();
        $output->writeln('<info>Dump finished</info>');
    })
    ;

$console
    ->register('cache:clear')
    ->setDescription('Clear the cache')
    ->setCode(function( InputInterface $input, OutputInterface $output ) use ($app) {
        
        exec('rm -rf ' . __DIR__ . '/../storage/cache/*');

        $output->writeln('<info>Cache cleared</info>');
    })
    ;

$console->run();

