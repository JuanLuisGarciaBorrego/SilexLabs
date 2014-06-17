<?php 

$app->get('/','JuanLuis\Controller\FrontEndController::indexAction')
    ->bind('portada');

$app->get('/saludo','JuanLuis\Controller\FrontEndController::saludoAction')
    ->bind('saludo');

$app->get('/eliminouna','JuanLuis\Controller\FrontEndController::eliminarUnaAction')
    ->bind('eliminoUna');

$app->get('/limpia','JuanLuis\Controller\FrontEndController::limpiaAction')
    ->bind('limpia');
