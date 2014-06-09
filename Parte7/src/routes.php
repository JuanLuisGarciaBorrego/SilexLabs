<?php 

$app->get('/','JuanLuis\Controller\FrontEndController::indexAction')
    ->bind('portada');
