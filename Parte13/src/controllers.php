<?php
use Symfony\Component\HttpFoundation\Request;

// Lógica de nuestra aplicación
$app->get('/', function() use($app){
   return  $app['twig']->render('FrontEnd/portada.twig');
})
->bind('portada');

$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('BackEnd/login.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})
->bind('login');

$app->get('/admin', function() use($app){
   return  $app['twig']->render('BackEnd/admin.twig');
})
->bind('admin');