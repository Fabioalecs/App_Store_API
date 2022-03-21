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
$app->put('/store/{id}', StoreController::class . ':updateStore');
$app->delete('/store/{id}', StoreController::class . ':deleteStore');


$app->get('/product', ProductController::class . ':getProduct');
$app->post('/product/{storeId}', ProductController::class . ':insertProduct');
$app->put('/product/{id}', ProductController::class . ':updateProduct');
$app->delete('/product/{id}', ProductController::class . ':deleteProduct');



$app->run();
