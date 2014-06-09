<?php 

use Silex\Application;

$app = new Application();

$app['debug'] = true;

//parametros
$app['nombre'] = "Juan Luis";

//servicio, se crea 1 instancia cada vez
$app['apellidos'] = function(){
	return new JuanLuis\Services\Apellidos();
};

//servicio compartido
$app['biografia'] = $app->share(function (){
	return new JuanLuis\Services\Biografia();
});

return $app;