<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;

$app = new Application();

$app['debug'] = true;

$app->register(new TwigServiceProvider(), array(
    'twig.path' => array(__DIR__.'/JuanLuis/Views')
));

return $app;
