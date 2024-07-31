<?php

$route = Flight::router();

$route->get('/', [new \App\Controller\IndexController(), 'index']);

$route->group('/api', function () use ($route){
    $route->get('/users', [new \App\Controller\UsersController(), 'list']);
    $route->post('/user/insert-update', [new \App\Controller\UsersController(), 'insertUpdate']);
    $route->post('/user/delete/@id', [new \App\Controller\UsersController(), 'delete']);
});

Flight::start();