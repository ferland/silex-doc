<?php
use Documents\User;

$app->get('/', function () use ($app) {
	// Your code here...
	$user = new User();
	$user->setUsername('Bulat S.');

	// tell Doctrine 2 to save $user on the next flush()
	$app['dm']->persist($user);

	$app['dm']->flush();
	
	return $app['twig']->render('hello.twig');
});