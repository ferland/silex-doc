<?php

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

define('ROOT',dirname(__DIR__.'/creditcard'));

if (!file_exists($file = ROOT.'/vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run this script.');
}

$loader = require_once $file;
$loader->add('Documents', ROOT.'/app');

$connection = new Connection();

$config = new Configuration();
$config->setProxyDir(ROOT . '/app/assets/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(ROOT . '/app/assets/Hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setDefaultDB('ccapps');
$config->setMetadataDriverImpl(AnnotationDriver::create(ROOT . '/app/Documents'));

AnnotationDriver::registerAnnotationClasses();

$app = new Silex\Application();

$app['debug'] = getenv('MYAPP_DEBUG') == 'true' ?: false;

$app['dm'] = $dm = DocumentManager::create($connection, $config);

//register log
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => ROOT.'/public/logs/development.log',
));

$app->register(new Silex\Provider\SessionServiceProvider());

// view
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => ROOT.'/app/view',
    'twig.class_path'   => __DIR__.'/vendor/twig/lib',
));

$app->before(function () use ($app) {
    $app['twig']->addGlobal('layout', null);
    $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('layout/layout.twig'));
});

if ($app['debug']) {
  $app['twig']->addGlobal('env', 'production');
} else {
  $app['twig']->addGlobal('env', 'development');
}


$app->register(new Silex\Provider\ValidatorServiceProvider());

// controllers
$controllers = glob(ROOT.'/app/controller/*.php');
foreach ($controllers as $file) {
  require $file;
}

$app->run();
