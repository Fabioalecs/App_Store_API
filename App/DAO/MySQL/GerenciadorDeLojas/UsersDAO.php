<?php

namespace App\DAO\MySQL\GerenciadorDeLojas;

use App\Models\MySQL\GerenciadorDeLojas\UserModel;

class UsersDAO extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserByEmail($email): ?UserModel
    {
        $stmt = $this->pdo
            ->prepare('SELECT 
                    id,
                    nome, 
                    email,
                    senha
                FROM usuarios
                WHERE email = :email
            ');
        $stmt->bindParam('email', $email);
        $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(count($users) === 0)
        {
            return null;
        }
        $user = new UserModel($users[0]['id']);
        $user->setName($users[0]['nome'])
            ->setEmail($users[0]['email'])
            ->setPassword($users[0]['senha'])
            ->getId();
        
        return $user;
    }
}