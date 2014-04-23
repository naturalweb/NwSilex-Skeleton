<?php
// Routes

// Page Home
$app->get('/', 'HomeController::getIndex')
	->bind('homepage');

// Route Default para Paginas Institucionais
$app->get('/{page}', 'PagesController::getPage')
	->assert('page', '.+')
	->bind('pages');
