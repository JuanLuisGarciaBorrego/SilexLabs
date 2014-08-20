<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

$app = new Silex\Application();
$app['debug'] = true;

/*
	* Providers
*/
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());

/*
	* Mi aplicación
*/
$app->match('/', function (Request $request) use ($app) {

    $form =  $app['form.factory']->createBuilder('form')
        ->add('nombre', 'text',
            array(
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Escriba su nombre'
                ),
                'constraints' => new Assert\NotBlank(array('message' => 'Este campo no puede estar vacio'))
                )
        )
        ->add('archivo', 'file',
            array(
                'required' => false,
                'constraints' => new Assert\File(array(
                        'maxSize' => '1024k',
                        'mimeTypes' => array(
                            'application/pdf',
                            'application/x-pdf',
                        ),
                        'mimeTypesMessage' => 'Por favor, sube un archivo PDF válido',
                        'maxSizeMessage' => 'El archivo supera el tamaño máximo permitido de 1MB',
                    ))
                )
        )
        ->getForm();

    if ($request->isMethod('POST')) {
        $form->bind($request);
        if ($form->isValid()) {
            //parámetros del formulario
            $parametros = $request->request->all();
            //ladybug_dump($parametros);
            //input -> nombre
            //ladybug_dump($parametros['form']['nombre']);

            //archivos file del formulario
            $archivo=$request->files->get($form->getName());

            // archivo = nombre campo file del formulario
            $archivo=$archivo['archivo'];

            //Devuelve el objecto UploadFile con todos sus propiedades y métodos
            ladybug_dump($archivo);

            //Devuelve el nombre del archivo original
            ladybug_dump($archivo->getClientOriginalName());
            //Devuelve la extensión del archivo original
            ladybug_dump($archivo->getClientOriginalExtension());
            //Devuelve el tipo de archivo MIME.
            ladybug_dump($archivo->getClientMimeType());
            //Devuelve el tamaño del archivo.
            ladybug_dump($archivo->getClientSize());

            $path = __DIR__.'/archivos/';
            $archivo->move($path,$archivo->getClientOriginalName());

            return "Hola ".$parametros['form']['nombre']."<hr>Archivo: <b>".$archivo->getClientOriginalName(). "</b> subido correctamente.<hr>";
        }
    }

    return $app['twig']->render('index.twig', array(
        'form' => $form->createView()
    ));
})
->method('GET|POST')
->bind('portada');

$app->run();
