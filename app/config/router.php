<?php

$router = $di->getRouter();

//define routes

$router->handle($_SERVER['REQUEST_URI']);

$router->add(
    '/login',
    ['controller' => 'login', 'action' => 'index'],
);

