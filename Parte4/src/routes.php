<?php 

$app->mount('/admin', include 'Controllers/Backend.php');

$app->mount('/', include 'Controllers/FrontEnd.php');
