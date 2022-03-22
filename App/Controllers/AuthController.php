<?php


namespace App\Controllers;

use App\DAO\MySQL\GerenciadorDeLojas\UsersDAO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class AuthController 
{
    public function login(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $email = $data['email'];
        var_dump($email);

        $usersDAO = new UsersDAO();
        $user = $usersDAO->getUserByEmail($email);

        var_dump($user);
        return $response;
    }

}