<?php
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Schema\Table;
// Lógica de nuestra aplicación
$app->get('/', function() use($app){
   return  $app['twig']->render('FrontEnd/portada.twig');
})
->bind('portada');

$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('BackEnd/login.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})
->bind('login');

$app->get('/admin', function() use($app){
	$token = $app['security']->getToken();
   	return  $app['twig']->render('BackEnd/admin.twig', array(
   		'user' => $token->getUsername()
   	));
})
->bind('admin');

$app->get('/crear', function() use($app){
   $schema = $app['db']->getSchemaManager();
	if (!$schema->tablesExist('users')) {
	    $users = new Table('users');
	    $users->addColumn('id', 'integer', array('unsigned' => true, 'autoincrement' => true));
	    $users->setPrimaryKey(array('id'));
	    $users->addColumn('username', 'string', array('length' => 32));
	    $users->addUniqueIndex(array('username'));
	    $users->addColumn('password', 'string', array('length' => 255));
	    $users->addColumn('roles', 'string', array('length' => 255));
	 
	    $schema->createTable($users);
	 	//password = foo
	    $app['db']->executeQuery('INSERT INTO users (username, password, roles) VALUES ("admin", "5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg==", "ROLE_ADMIN")');
	    $app['db']->executeQuery('INSERT INTO users (username, password, roles) VALUES ("juanlu", "5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg==", "ROLE_USER")');
	}
	return "Creada";
})
->bind('bd');
