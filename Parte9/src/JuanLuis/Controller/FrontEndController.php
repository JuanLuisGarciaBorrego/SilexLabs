<?php 
namespace JuanLuis\Controller;

use Silex\Application;

class FrontEndController
{
	public function indexAction(Application $app)
	{
		$propuestas = $app['db']->fetchAll('SELECT * FROM ejemplos');

		return $app['twig']->render('portada.twig', array(
        	'propuestas' => $propuestas,
    	));
	}
}