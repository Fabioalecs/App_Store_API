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

    public function insertStore(StoreModel $store): void
    {
        $stmt = $this->pdo
            ->prepare('INSERT INTO lojas VALUES(
                null, 
                :nome,
                :telefone,
                :endereco
                );');
        $stmt->execute([
            'nome' => $store->getName(),
            'telefone' => $store->getTelephone(),
            'endereco' => $store->getAddress()
            ]);
    }

    public function updateStore(StoreModel $store): void
    {
        $stmt = $this->pdo
            ->prepare('UPDATE lojas SET
                    nome = :nome,
                    telefone = :telefone,
                    endereco = :endereco
                WHERE 
                    id = :id    
            ;');
        $stmt->execute([
            'nome' => $store->getName(),
            'telefone' => $store->getTelephone(),
            'endereco' => $store->getAddress(),
            'id' => $store->getId()
        ]);   
    }

    public function deleteStore(int $id): void
    {
        $stmt = $this->pdo
            ->prepare('DELETE FROM lojas WHERE id = :id;
                DELETE FROM produtos WHERE loja_id = :id;
            ');
        $stmt->execute([
            'id' => $id
        ]);
    }
}