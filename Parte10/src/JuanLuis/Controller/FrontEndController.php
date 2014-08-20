<?php
namespace JuanLuis\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class FrontEndController
{
    public function contactoAction(Application $app, Request $request)
    {
        $mensaje = Swift_Message::newInstance()
            ->setSubject('Formulario Contacto-'.$request->get('asunto'))
            ->setFrom(array($request->get('nombre')))
            ->setTo(array($app['email']))
            ->setBody($request->get('mensaje'));

        $app['mailer']->send($mensaje);

        return new Response('Gracias!', 201);
    }
}
