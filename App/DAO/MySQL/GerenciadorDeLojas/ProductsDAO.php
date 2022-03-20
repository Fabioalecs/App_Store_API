<?php

namespace App\DAO\MySQL\GerenciadorDeLojas;

class ProductsDAO extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProducts(): array
    {
        $products = $this->pdo
            ->query('SELECT id, loja_id, nome, preco, quantidade FROM produtos;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        
        return $products;
    }

    public function insertProduct(): void
    {
        
    }

}