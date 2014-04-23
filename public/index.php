<?php
define('PUBLIC_PATH', __DIR__);
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');

require_once __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../app/boot/start.php';

$app->run();
