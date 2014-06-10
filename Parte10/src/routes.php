<?php 

$app->get('/','JuanLuis\Controller\FrontEndController::contactoAction')
    ->bind('contacto');
