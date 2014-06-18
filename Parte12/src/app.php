<?php
//Registro de todos los servicios y configuración de nuestra aplicación
use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Silex\Provider\SecurityServiceProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new TwigServiceProvider(), array(
    'twig.path' => array(__DIR__.'/../views'),
));

$app['security.encoder.digest'] = $app->share(function ($app) {
    return new MessageDigestPasswordEncoder('sha1', false, 1);
});
//password = foo
$app->register(new SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'admin' => array(
            'pattern' => '^/admin',
            'http' => true,
            'users' => array(
                'admin' => array('ROLE_ADMIN', '5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg=='),
            ),
        ),
    )
));

return $app;