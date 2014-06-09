<?php 
namespace JuanLuis\Controller;

use Silex\Application;

class FrontEndController
{
	public function indexAction(Application $app)
	{
		$saludo = 'Hola a todos';
		return $app['twig']->render('portada.twig', array(
        	'saludo' => $saludo,
    	));
	}
}