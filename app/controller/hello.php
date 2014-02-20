<?php
/*
	Hello controller set as landing page.

*/

$app->get('/', function () use ($app) {

	$app['dm']->flush();

  $data = array();

  $data['title'] = "Silex skeleton app";

  $data['content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.";

	return $app['twig']->render('hello.twig', $data);
});
