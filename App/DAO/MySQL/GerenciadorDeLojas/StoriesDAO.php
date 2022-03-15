<?php

namespace App\DAO\MySQL\GerenciadorDeLojas;

use App\Models\MySQL\GerenciadorDeLojas\StoreModel;

class StoriesDAO extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllStories(): array
    {
        $stories = $this->pdo
        ->query('SELECT id, nome, telefone, endereco FROM lojas;')
        ->fetchAll(\PDO::FETCH_ASSOC);

        return $stories;
    }

    public function insertStore(StoreModel $storie): void
    {
        $stmt = $this->pdo
        ->prepare('INSERT INTO lojas VALUES(
            null, 
            :nome,
            :telefone,
            :endereco
            );');
        $stmt->execute([
          'nome' => $storie->getName(),
          'telefone' => $storie->getTelephone(),
          'endereco' => $storie->getAddress()
        ]);
    }
}