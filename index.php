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

$app['dm'] = $dm = DocumentManager::create($connection, $config);

//register log
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => ROOT.'/public/logs/development.log',
));

$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => ROOT.'/app/view',
));

$app->register(new Silex\Provider\ValidatorServiceProvider());

// view
$app->register(new SilexPhpEngine\ViewServiceProvider, [
  'view.paths'  => ROOT.'/app/view/%name%.php',
  'assets.root' => '../assets'
]);

// controllers
$controllers = glob(ROOT.'/app/controller/*.php');
foreach ($controllers as $file) {
  require $file;
}

$app->run();