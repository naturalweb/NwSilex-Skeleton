<?php
use Silex\Application;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\Debug\ErrorHandler;

// Handler de Errors
$app->before(function (SymfonyRequest $request) use($app) {
    if ($app['debug'] !== true) {
        ErrorHandler::setLogger($app['monolog'], 'emergency');
        ErrorHandler::register();
    }
}, Application::EARLY_EVENT);

// Route de Error
$app->error(function(\Exception $exception, $code) use($app) {
	
    switch ($code) {
    	case 404: // Pagina não encontrada
    		$view = 'errors/404.html';
    		break;

    	case 403: // Sem Permissão
            $view = 'errors/403.html';
            break;

    	default:
    		$view = 'errors/error.html';
    		break;
    }

    return $app['twig']->render($view, compact('exception', 'code'));
});