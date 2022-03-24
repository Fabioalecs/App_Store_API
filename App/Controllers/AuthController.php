<?php

namespace App\Controllers;

use App\DAO\MySQL\GerenciadorDeLojas\TokensDAO;
use App\DAO\MySQL\GerenciadorDeLojas\UsersDAO;
use App\Models\MySQL\GerenciadorDeLojas\TokenModel;
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
        $expiredAt = $data['data_de_expiracao'];

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

        echo $user->getId();

        $tokenPayload = [
            'sub' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'expired_at' => $expiredAt
        ];

        $token = JWT::encode($tokenPayload, getenv('JWT_SECRET_KEY'));

        $refreshTokenPayload = [
            'email' => $user->getEmail()
        ];

        $refreshTokenPayload = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET_KEY'));

        $tokenModel = new TokenModel($user->getId());
        $tokenModel->setExpiredAt($expiredAt)
                   ->setRefreshToken($refreshTokenPayload)
                   ->setToken($token)
                   ->getUserId();

        $tokenDAO = new TokensDAO();
        $tokenDAO->createToken($tokenModel);

        $response = $response->withJson([
            "token" => $token,
            "refresh_token" => $refreshTokenPayload
        ]);

        return $response;
    }

}