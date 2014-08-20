<?php

$app->get('/hola/{nombre}', function ($nombre) use ($app) {
    return "Hola <b>".$app->escape($nombre)." </b>";
});
