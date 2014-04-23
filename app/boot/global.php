<?php
use NwSilex\Controller\ControllerResolver;
use NwSilex\Provider\ConfigServiceProvider;
use NwSilex\Provider\MailerServiceProvider;
use NwSilex\Provider\EloquentOrmServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Silex\Provider\HttpCacheServiceProvider;

// Enviroment
$app['app.env'] = $app->share(function () {
    return getenv('APP_ENV')?: 'production';
});

// Controller Resolver
$app['resolver'] = $app->share(function () use ($app) {
    return new ControllerResolver($app, $app['logger']);
});

//Config
$app->register(new ConfigServiceProvider());

// UrlGenerator
$app->register(new UrlGeneratorServiceProvider());

// Sessions
$app->register(new SessionServiceProvider());

//Cache
$app->register(new HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => ROOT_PATH.'/storage/cache/',
));

// Eloquent ORM
$app->register(new EloquentOrmServiceProvider());

//Template Twig
$app->register(new TwigServiceProvider(), array(
    'twig.path' => APP_PATH . '/views',
));

// Swift Mailer
$app->register(new MailerServiceProvider());

// Implement whatever logic you need to determine the asset path
// Criado o metodo asset() no twig, para colocar todos os asset
$app['twig'] = $app->share($app->extend('twig', function($twig, $app) {

    $twig->addFunction(new \Twig_SimpleFunction('asset', function($asset) use ($app) {
        return sprintf($app['request']->getBasePath().'/assets/%s', ltrim($asset, '/'));
    }));
    
    $twig->addFunction(new \Twig_SimpleFunction('get_class', function($object) use ($app) {
        return get_class($object);
    }));
    
    return $twig;
}));

// Monolog
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => ROOT_PATH.'/storage/logs/'.$app['app.env'].'-'.date("Y:m:d").'.log',
    'monolog.name'    => 'myapp',
    'monolog.level'   => \Monolog\Logger::NOTICE,
));

// Before
$app->before(function (SymfonyRequest $request) use($app) {

});

// After
$app->after(function (SymfonyRequest $request, SymfonyResponse $response) {

});
