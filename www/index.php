<?php
require __DIR__ .'/../vendor/autoload.php';

$mb = Minibase\MB::create(__DIR__)
	->loadConfigFile(__DIR__ . '/../app/app.json', __DIR__ . '/../app');

session_start();
$mb->start();
