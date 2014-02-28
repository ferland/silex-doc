<?php

define('ROOT',dirname(__DIR__.'/creditcard'));

if (!file_exists($file = ROOT.'/vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run this script.');
}

$loader = require_once $file;
$loader->add('Documents', ROOT.'/app');

$app = new Silex\Application();

// $app->register(new DerAlex\Silex\YamlConfigServiceProvider(__DIR__ . '/src/Resources/config/settings.yml'));

$app['debug'] = getenv('env') == 'true' ?: false;
$app['base_url'] = 'http://boilerplate.loangarage.local:8080';
$app['appName'] = 'Credit Card';

//register log
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => ROOT.'/public/logs/development.log',
    'monolog.level' => Monolog\Logger::ERROR
));

$app->register(new Silex\Provider\SessionServiceProvider());

// view
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => ROOT.'/app/view',
    'twig.class_path'   => ROOT.'/vendor/twig/lib',
    // 'twig.options' => array('cache' => ROOT.'/cache'),
));

$app->before(function () use ($app) {
    $app['twig']->addGlobal('layout', null);
    $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('layout/layout.twig'));
});

if ($app['debug']) {
  $app['twig']->addGlobal('env', 'production');
  require_once ROOT.'/app/config/prod.php';
} else {
  $app['twig']->addGlobal('env', 'development');
  require_once ROOT.'/app/config/dev.php';
}

$app->register(new Silex\Provider\ValidatorServiceProvider());

// controllers
$controllers = glob(ROOT.'/app/controller/*.php');
foreach ($controllers as $file) {
  require $file;
}

$app->run();
