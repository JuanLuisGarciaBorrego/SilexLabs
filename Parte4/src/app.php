<?php 

use Silex\Application;

$app = new Application();

$app['debug'] = true;

return $app;