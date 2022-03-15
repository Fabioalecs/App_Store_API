<?php

namespace App\Controllers;

use App\DAO\MySQL\GerenciadorDeLojas\StoriesDAO;
use App\Models\MySQL\GerenciadorDeLojas\StoreModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class StoreController 
{
    public function getStore(Request $request, Response $response, array $args): Response 
    {
        $storiesDAO = new StoriesDAO();
        $stories = $storiesDAO->getAllStories();
        $response = $response->withJson($stories);

        return $response;
    }
    
    public function insertStore(Request $request, Response $response, array $args): Response 
    {
        $data = $request->getParsedBody();

        $storiesDAO = new StoriesDAO();
        $store = new StoreModel();
        $store->setName($data['nome'])
              ->setAddress($data['endereco'])
              ->setTelephone($data['telefone']);
        $storiesDAO->insertStore($store);

        $response = $response->withJson([
            'message' => 'Loja Inserida Com Sucesso!'
        ]);

        return $response;
    }
    
    public function updateStore(Request $request, Response $response, array $args): Response 
    {


        return $response;
    }
    
    public function deleteStore(Request $request, Response $response, array $args): Response 
    {
        

        return $response;
    }

}
