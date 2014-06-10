<?php 

use Silex\Application;
use Silex\Provider\SwiftmailerServiceProvider;

$app = new Application();

$app['debug'] = true;

$app['email'] = 'miEmail@gmail.com'
$app->register(new SwiftmailerServiceProvider(), array(
    'swiftmailer.options' => array(
        'host' => 'smtp.gmail.com',
	    'port' => 465,
	    'username' => $app['email'],
	    'password' => 'tuPasswordGmail',
	    'encryption' => 'ssl',
	    'auth_mode' => 'login'
    )
));

return $app;
