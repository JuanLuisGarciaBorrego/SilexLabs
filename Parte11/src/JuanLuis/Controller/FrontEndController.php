<?php 
namespace JuanLuis\Controller;
use Symfony\Component\HttpFoundation\Response;

use Silex\Application;

class FrontEndController
{
	public function indexAction(Application $app)
	{	
		$app['session']->set('nombre','Juan Luis');
		$app['session']->set('apellido','Garcia Borrego');
		return "He inicializado 2 sesiones";
	}

	public function saludoAction(Application $app)
	{	
		return "Imprimo 2 sesiones. ".$app['session']->get('nombre')."<br>y tambien ".$app['session']->get('apellido');
		
	}
	public function eliminarUnaAction(Application $app)
	{	
		return "he eliminado la session ".$app['session']->remove('apellido');
	}
	public function limpiaAction(Application $app)
	{	
		$app['session']->clear();
		return "Elimino todas las sessiones";
	}
}