<?php

// Lógica de nuestra aplicación
$app->get('/', function () use ($app) {
   return  $app['twig']->render('FrontEnd/portada.twig');
})
->bind('portada');

$app->get('/admin', function () use ($app) {
   return  $app['twig']->render('BackEnd/admin.twig');
})
->bind('admin');
