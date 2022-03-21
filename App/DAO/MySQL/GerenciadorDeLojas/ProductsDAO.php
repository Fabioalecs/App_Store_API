<?php

namespace App\DAO\MySQL\GerenciadorDeLojas;

use App\Models\MySQL\GerenciadorDeLojas\ProductModel;

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

    public function insertProduct(ProductModel $product): void
    {
        $stmt = $this->pdo
            ->prepare('INSERT INTO produtos VALUES(
                null,
                :loja_id,
                :nome,
                :preco,
                :quantidade
                );');
        $stmt->execute([
            'loja_id' => $product->getStoreId(),
            'nome' => $product->getName(),
            'preco' => $product->getPrice(),
            'quantidade' => $product->getAmount()  
        ]);
    }

    public function updateProduct(ProductModel $product): void
    {
        $stmt = $this->pdo
            ->prepare('UPDATE produtos SET
            nome = :nome,
            preco = :preco,
            quantidade = :quantidade
        WHERE 
            id = :id
        ;');
        $stmt->execute([
            'nome' => $product->getName(),
            'preco' => $product->getPrice(),
            'quantidade' => $product->getAmount(),
            'id' => $product->getId()
        ]);
    }

    public function deleteProduct(int $id): void
    {
        $stmt = $this->pdo
            ->prepare('DELETE FROM produtos WHERE id = :id');
        $stmt->execute([
            'id' => $id
        ]);
    }
}