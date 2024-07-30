<?php

$route = Flight::router();

$route->get('/', [new \App\Controller\IndexController(), 'index']);

$route->group('/api', function () use ($route){
    $route->get('/users', [new \App\Controller\UsersController(), 'list']);
    $route->post('/user/insert', [new \App\Controller\UsersController(), 'insert']);
    $route->post('/user/delete/@id', [new \App\Controller\UsersController(), 'delete']);
});

Flight::start();