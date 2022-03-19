<?php


use App\Controllers\{
    AuthController,
    ProductController,
    StoreController
};

use function src\slimConfiguration;

$app = new \Slim\App(slimConfiguration());

$app->post('/login', AuthController::class . ':login');

$app->get('/store', StoreController::class . ':getStore');
$app->post('/store', StoreController::class . ':insertStore');
$app->put('/store', StoreController::class . ':updateStore');
$app->delete('/store', StoreController::class . ':deleteStore');


$app->get('/product', ProductController::class . ':getProduct');
$app->post('/product', ProductController::class . ':insertProduct');
$app->put('/product', ProductController::class . ':updateProduct');
$app->delete('/product', ProductController::class . ':deleteProduct');



$app->run();
