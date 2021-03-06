<?php

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

if (!file_exists($file = __DIR__.'/../vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run this script.');
}

$loader = require_once $file;
$loader->add('Documents', __DIR__);

$connection = new Connection();

$config = new Configuration();
$config->setProxyDir(__DIR__ . 'assets/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . 'assets/Hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setDefaultDB('doctrine_odm_sandbox');
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '/Documents'));

AnnotationDriver::registerAnnotationClasses();

$app = new Silex\Application();
$app['dm'] = $dm = DocumentManager::create($connection, $config);
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