<?php

require ((php_sapi_name() == 'cli-server')? '' : '../') . 'vendor/autoload.php';

// Create new app
$app = new \SigmaPHP\Core\App\Kernel();

// Run
$app->init();
