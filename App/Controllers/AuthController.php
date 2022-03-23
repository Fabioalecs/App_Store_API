<?php

namespace App\Controllers;

use App\DAO\MySQL\GerenciadorDeLojas\UsersDAO;
use DateTime;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;

final class AuthController 
{
    public function login(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $email = $data['email'];
        $password = $data['senha'];

        $usersDAO = new UsersDAO();
        $user = $usersDAO->getUserByEmail($email);

        if(is_null($user))
        {
            return $response->withStatus(401);
        }

        if(!password_verify($password, $user->getPassword()))
        {
            return $response->withStatus(401);
        }

        $expiredDate = (new \DateTime())->modify('+2 days')
        ->format('Y-m-d H:i:s');

        $tokenPayload = [
            'sub' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'expired_at' => $expiredDate
        ];

        $token = JWT::encode($tokenPayload, getenv('JWT_SECRET_KEY'));

        $refreshTokenPayload = [
            'email' => $user->getEmail()
        ];

        $refreshTokenPayload = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET_KEY'));

        var_dump($token);
        
        return $response;
    }

}