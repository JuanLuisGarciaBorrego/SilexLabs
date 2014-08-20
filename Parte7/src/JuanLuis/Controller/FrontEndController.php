<?php
namespace JuanLuis\Controller;

use Silex\Application;

class FrontEndController
{
    public function indexAction(Application $app)
    {
        return "Hola ".$app['nombre']." ".
                $app['apellidos']->dimelos()."<hr>".
                $app['biografia']->personal();

    }
}
