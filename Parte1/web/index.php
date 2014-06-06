<?php 

require_once __DIR__.'/../vendor/autoload.php';

$app =  new Silex\Application();

$app->get('/hola/{nombre}', function($nombre) use($app){
	return "Hola <b>".$app->escape($nombre)." </b>";
});

$app->run();