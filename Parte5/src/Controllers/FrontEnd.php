<?php
require_once __DIR__.'/../Data/saludos.php';
require_once __DIR__.'/../Data/despedidas.php';

$frontend = $app['controllers_factory'];

$frontend->get('/', function () use ($app) {
    return "Saludo informal : ".$app['saludos']['informal']
            ."<br>Despedida informal: ".$app['despedidas']['informal'];
    ;
});

return $frontend;
