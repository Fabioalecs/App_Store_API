<?php

namespace App\Controllers;

use App\DAO\MySQL\GerenciadorDeLojas\ProductsDAO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


final class ProductController 
{

    public function getProduct(Request $request, Response $response, array $args): Response
    {   
        $productsDAO = new ProductsDAO();
        $products = $productsDAO->getAllProducts();
        $response = $response->withJson($products);
        
        return $response;
    }

    public function insertProduct(Request $request, Response $response, array $args): Response
    {
       

        return $response;
    }

    public function updateProduct(Request $request, Response $response, array $args): Response
    {
       

        return $response;
    }

    public function deleteProduct(Request $request, Response $response, array $args): Response
    {
       

        return $response;
    }



}