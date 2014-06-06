<?php

$frontend = $app['controllers_factory'];

$frontend->get('/', function() use($app){
    return "Hola estoy en el frontend";
});

return $frontend;