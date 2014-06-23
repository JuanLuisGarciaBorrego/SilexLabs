<?php 
/*
	* Funciones anónimas
	* Como su nombre indica una función anónima es una función sin nombre.
	*
	* Esta capacidad fue añadida a PHP en la versión 5.3
	*
	* Se crea igual que otras funciones pero sin asociarle un nombre. Sin embargo,
	* la podemos asignar a una variable con el propósito de hacer uso más adelante 
	* todas las veces que necesitemos (llamadas funciónes Lambdas).
*/

/*
	* Definición de la funcion anónima asociada a la variable $hola (Lambda)
*/

	$hola = function($nombre){
		echo "Hola ".$nombre."<br>";
	};

/*
	* Llamamos a la función a través de la variable $hola
*/

	$hola('Juanlu');
	$hola('Juan Luis');

/*
	* También podemos hacer uso de parámetros que estén fuera de su ambito (scope)
	* a través de la palabra use (a esto se le llama Closure)
*/
	
	$nombres = ['Juan Luis', 'Juan', 'Luis'];

	$hola = function($id) use ($nombres){
		echo "Hola ".$nombres[$id]."<br>";
	};
	
	$hola(2);

/*
	* Ejemplo de Closures en Silex PHP
*/
	$app->get('/hello/{name}', function($name) use($app) { 
    	return 'Hello '.$name; 
	});


