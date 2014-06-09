<?php 

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

$app = new Application();

$app['debug'] = true;

$app->register(new TwigServiceProvider(), array(
	'twig.path' => array(__DIR__.'/JuanLuis/Views')
));

$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'app',
        'user' => 'root',
        'password' => 'juanlu'
    )
));

return $app;
