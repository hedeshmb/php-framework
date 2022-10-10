<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$map = [
    '/hello' => 'hello', //  __DIR__ . '/../src/pages/hello.php',
    '/bye'   => 'bye', //__DIR__ . '/../src/pages/bye.php',
];

$path = $request->getPathInfo();
if (isset($map[$path])) {
    ob_start();
   // var_export(extract($request->query->all(), EXTR_SKIP));exit;
    include sprintf(__DIR__.'/../src/pages/%s.php', $map[$path]);
    $response = new Response(ob_get_clean());

//    include $map[$path];
//    $response->setContent(ob_get_clean());
} else {
    $response = new Response('Not Found', 404);

//    $response->setStatusCode(404);
//    $response->setContent('Not Found');
}

$response->send();