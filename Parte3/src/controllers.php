<?php

//get
$app->get('/hola/{nombre}/', function ($nombre) use ($app) {
    return "Hola <b>".$app->escape($nombre)." </b>";
});

//post
/*
$app->post('/contacto', function (Request $request) use ($app) {
	...
});

*/
//varios métodos
$app->match('/metodos/', function () {
    return "Recibe por post y get";
})
->method('GET|POST');

//restringiendo datos + valor por defecto + nombre de ruta
$app->get('/datos/{id}', function ($id) {
    return "Dato: ".$id;
})
->assert('id','\d+')
->value('id',2)
->bind('datos');

$app->error(function (\Exception $e, $code) {
    if ($code == 404) {
        return 'Ups!!!, no existe nada de esto ';
    } else {
        return 'Hay algún error!!';
    }
});
