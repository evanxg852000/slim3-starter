<?php
// DIC configuration
$container = $app->getContainer();

/* eloquent */
$container['eloquent'] = function ($c) {
    $dbConfig = $c->get('settings')['db'];
    $connFactory = new \Illuminate\Database\Connectors\ConnectionFactory();
	$conn = $connFactory->make($dbConfig);
	$resolver = new \Illuminate\Database\ConnectionResolver();
	$resolver->addConnection('default', $conn);
	$resolver->setDefaultConnection('default');
	\Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);
    return $conn;
};

/* view */
$container['view'] = function ($c) {
    $settings = $c->get('settings')['view'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

/* monolog */
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};






