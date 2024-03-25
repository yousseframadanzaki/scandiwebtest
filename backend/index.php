<?php

require __DIR__ .'/vendor/autoload.php';

use App\Core\Router;
use App\Controllers\ProductController;

$controller = new ProductController;
Router::get('/products',[$controller,'all']);
Router::post('/products',[$controller,'create']);
Router::delete('/products',[$controller,'delete']);
Router::dispatch();


?>