<?php
namespace Tests;

class WebTestCase extends \NwSilex\Testing\TestCase
{
	/**
     * Creates the application.
     *
     * @return HttpKernel
     */
    public function createApplication()
    {
    	$app = require __DIR__ . '/../app/boot/start.php';
    	$app['debug'] = true;
    	$app['app.env'] = 'testing';
    	$app['exception_handler']->disable();
    	
    	return $app;
    }
}
