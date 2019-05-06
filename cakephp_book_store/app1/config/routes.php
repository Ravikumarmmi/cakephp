<?php

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;


Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {

    //$routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    $routes->connect('/', ['controller' => 'Book', 'action' => 'index']);
    $routes->connect('/book/create', ['controller' => 'Book', 'action' => 'create']);
    $routes->connect('/book/edit/:id', ['controller' => 'Book', 'action' => 'edit'],["pass"=>["id"]]);
    $routes->connect('/book/update', ['controller' => 'Book', 'action' => 'update']);
    $routes->connect('/book/delete/:id', ['controller' => 'Book', 'action' => 'delete'],["pass"=>["id"]]);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->fallbacks(DashedRoute::class);
});
