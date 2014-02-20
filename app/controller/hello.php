<?php
/*
	Hello controller set as landing page.

*/

$app->get('/', function () use ($app) {
	return $app['twig']->render('hello.twig');
});