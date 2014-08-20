<?php

$backend =  $app['controllers_factory'];

$backend->get('/', function () use ($app) {
   return "Hola estoy en el backend";
});

return $backend;
