<?php
use Documents\User;

$app->get('/', function () use ($app) {
	// Your code here...
	$user = new User();
	$user->setUsername('Bulat S.');

	// tell Doctrine 2 to save $user on the next flush()
	$app['dm']->persist($user);

	$app['dm']->flush();

  $data = array();

  $data['title'] = "Silex skeleton app";

  $data['content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.";

	return $app['twig']->render('hello.twig', $data);
});
