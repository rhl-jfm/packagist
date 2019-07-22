<?php

use Symfony\Component\HttpFoundation\Request;

/**
 * @var \Symfony\Component\ClassLoader\ClassLoader
 */
$loader = require __DIR__.'/../app/autoload.php';
include_once __DIR__.'/../app/bootstrap.php.cache';

$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();

Request::setTrustedProxies(['10.254.0.73','10.254.0.74']);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
