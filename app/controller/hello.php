<?php
/*
	Hello controller set as landing page.

*/

$app->get('/', function () use ($app) {

	$app['dm']->flush();

  $data = array();

  $data['title'] = "Credit Card";

	return $app['twig']->render('home.twig', $data);
});
