<?php

$app = new \NwSilex\Foundation\Application();

require __DIR__ . '/constants.php';

require __DIR__ . '/global.php';

if (file_exists(__DIR__ . '/local.php')) {	require __DIR__ . '/local.php'; }

require __DIR__ . '/errors.php';

require __DIR__ . '/routes.php';

return $app;
