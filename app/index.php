<?php

require_once '../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__ . '/config/dev.php';

define('ROOT',dirname(__DIR__));

//register log
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => 'logs/development.log',
));

$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => ROOT.'/app/view',
));

$app->register(new Silex\Provider\ValidatorServiceProvider());

// view
$app->register(new SilexPhpEngine\ViewServiceProvider, [
  'view.paths'  => __DIR__.'/view/%name%.php',
  'assets.root' => '../assets'
]);

// controllers
$controllers = glob(__DIR__.'/controller/*.php');
foreach ($controllers as $file) {
  require $file;
}

$app->run();