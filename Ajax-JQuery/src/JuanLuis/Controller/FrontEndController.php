<?php
namespace JuanLuis\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

class FrontEndController
{
    public function indexAction(Application $app)
    {
        $title = 'Silex con Ajax';

        return $app['twig']->render('portada.twig', array(
            'title' => $title,
        ));
    }

    public function quienSoyAction(Application $app)
    {
        $soy = ['nombre' => 'Juan Luis'];

        //return new Response(var_dump($soy));
        return $app->json($soy);
    }
}
