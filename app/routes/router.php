<?php

$route = Flight::router();

$route->get('/', [new \App\Controller\IndexController(), 'index']);

/*$route->group('/api', function () use ($route){
    $route->post('/refresh', [new \App\Controller\IndexController(), 'refresh']);
    $route->get('/download', [new \App\Controller\IndexController(), 'download']);
});*/

Flight::start();