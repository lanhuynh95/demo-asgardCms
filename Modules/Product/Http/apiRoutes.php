<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->get('product/products/list', [
    'as' => 'admin.product.product.list',
    'uses' => 'ProductController@list',
]);
