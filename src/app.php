<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('hello', new Routing\Route('/hello/{name}', ['name' => 'World', '_controller' => function (Request $request) {
        // $foo will be available in the template
    $request->attributes->set('foo', 'bar');

    $response = render_template($request);

    // change some header
    $response->headers->set('Content-Type', 'text/plain');

    return $response;
}]));

$routes->add('bye', new Routing\Route('/bye', [
    '_controller' => function (Request $request) {
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
    '_controller' => 'Calendar\Controller\LeapYearController::index'
]));

return $routes;