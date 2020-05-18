<?php

$router->get('/index', [
    'as' => 'index', 'uses' => 'Controller@index'
]);

$router->get('/random-images', [
    'as' => 'random-images', 'uses' => 'Controller@random_images'
]);
