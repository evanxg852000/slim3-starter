<?php
return [
    'displayErrorDetails' => true, // set to false in production

    /* eloquant */
    'db'=>[
		'driver' => 'mysql',
		'host' => '127.0.0.1',
		'database' => '',
		'username' => '',
		'password' => '',
		'collation' => 'utf8_general_ci',
		'prefix' => ''
	],

    /* view */
    'view' => [
        'template_path' => __DIR__ . '/../templates/',
    ],

    /* monolog */
    'logger' => [
        'name' => 'slim-app',
        'path' => __DIR__ . '/../logs/app.log',
    ]

];