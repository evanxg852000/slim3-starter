<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    if (is_file($file)) {
        return false;
    }
}

require(__DIR__ . '/../vendor/autoload.php');


session_start();

// Instantiate the app
$config = require(__DIR__ . '/../app/config.php');
$app = new \Slim\App(["settings" => $config]);


/* set up dependencies */
require(__DIR__ . '/../app/dependencies.php');

/* register middlewares */
require(__DIR__ . '/../app/middleware.php');

/* include helpers */
require(__DIR__ . '/../app/helpers.php');

/* register routes */
require(__DIR__ . '/../app/routes.php');

/* run app */
$app->run();
