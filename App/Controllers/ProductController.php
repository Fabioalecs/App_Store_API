<?php

namespace App\Controllers;

use App\DAO\MySQL\GerenciadorDeLojas\ProductsDAO;
use App\Models\MySQL\GerenciadorDeLojas\ProductModel;
use App\Models\MySQL\GerenciadorDeLojas\StoreModel;
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
       $data = $request->getParsedBody();

       $productsDAO = new ProductsDAO();
       $product = new ProductModel(['storeId' => $args['storeId']]);
       $product->setName($data['nome'])
               ->setPrice($data['preco'])
               ->setAmount($data['quantidade']);
        $productsDAO->insertProduct($product);

        $response = $response->withJson([
            'message' => 'Produto Inserido Com Sucesso!'
        ]);

        return $response;
    }

    public function updateProduct(Request $request, Response $response, array $args): Response
    {
       $data = $request->getParsedBody();

       $productsDAO = New ProductsDAO();
       $product = new ProductModel(['id' => $args['id']]);
       $product->setName($data['nome'])
               ->setPrice($data['preco'])
               ->setAmount($data['quantidade']);
       $productsDAO->updateProduct($product);

       $response = $response->withJson([
           'message' => 'Produto Alterado com Sucesso!'
       ]); 
    
       return $response;
    }

    public function deleteProduct(Request $request, Response $response, array $args): Response
    {
       

        return $response;
    }



}