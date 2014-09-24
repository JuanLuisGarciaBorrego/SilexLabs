<?php

$app->get('/','JuanLuis\Controller\FrontEndController::indexAction')
    ->bind('portada');

$app->post('/quien-soy','JuanLuis\Controller\FrontEndController::quienSoyAction')
    ->bind('quien-soy');
