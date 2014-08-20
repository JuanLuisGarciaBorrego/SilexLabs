<?php
//Registro de todos los servicios y configuración de nuestra aplicación
use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use JuanLuis\User\UserProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new TwigServiceProvider(), array(
    'twig.path' => array(__DIR__.'/../views'),
));

$app->register(new UrlGeneratorServiceProvider());
$app->register(new SessionServiceProvider());

$app['security.encoder.digest'] = $app->share(function ($app) {
    return new MessageDigestPasswordEncoder('sha1', false, 1);
});
//password = foo
$app->register(new SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'admin' => array(
            'pattern' => '^/admin',
            'form' => array('login_path' => '/login', 'check_path' => '/admin/login_check'),
            'logout' => array('logout_path' => '/admin/logout'),
            'users' => $app->share(function () use ($app) {
                return new UserProvider($app['db']);
            }),
        ),
    )
));

$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'    => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'test',
        'user'      => 'root',
        'password'  => 'juanlu',
        'charset'   => 'utf8',
    ),
));

return $app;
