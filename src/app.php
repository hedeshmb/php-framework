<?php

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;

require_once __DIR__.'/../controller/LeapYearController.php';


$routes = new Routing\RouteCollection();

$routes->add('hello', new Routing\Route('/hello/{name}', ['name' => 'World', '_controller' => function ($request) {
    var_export("asa");exit;
    // $foo will be available in the template
    $request->attributes->set('foo', 'bar');

    $response = render_template($request);

    // change some header
    $response->headers->set('Content-Type', 'text/plain');

    return $response;
}]));

$routes->add('bye', new Routing\Route('/bye', [
    '_controller' => function ($request) {
        return render_template($request);
    }]));

function is_leap_year($year = null)
{
    if (null === $year) {
        $year = date('Y');
    }

    return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
}

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => [new LeapYearController(), 'index'],
]));

return $routes;