<?php 
namespace JuanLuis\Controller;


use Silex\Application;

class FrontEndController
{
	public function indexAction(Application $app)
	{
		return "hola a todos";
	}
}