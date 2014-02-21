<?php
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

$connection = new Connection();

$config = new Configuration();
$config->setProxyDir(ROOT . '/app/assets/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(ROOT . '/app/assets/Hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setDefaultDB('ccapps');
$config->setMetadataDriverImpl(AnnotationDriver::create(ROOT . '/app/Documents'));

AnnotationDriver::registerAnnotationClasses();

$app['dm'] = DocumentManager::create($connection, $config);

$app['debug'] = true;