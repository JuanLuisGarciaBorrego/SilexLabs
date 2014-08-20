<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\SessionServiceProvider;

$app = new Application();

$app['debug'] = true;

$app->register(new TwigServiceProvider(), array(
    'twig.path' => array(__DIR__.'/JuanLuis/Views')
));

$app->register(new SessionServiceProvider());

return $app;
