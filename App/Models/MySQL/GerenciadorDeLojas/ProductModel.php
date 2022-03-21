<?php

namespace App\Models\MySQL\GerenciadorDeLojas; 

final Class ProductModel 
{

    /**
     * @var int
     */
    
    private $id;

    /**
     * @var int
     */
    
    private $storeId;
    
    /**
     * @var string
     */
    
     private $name;
    
     /**
     * @var string
     */
    private $price;
    
    /**
     * @var string
     */
    private $amount; 
    
    
    public function __construct(array $data = null)
    {
        $this->id = array_key_exists('id', $data) ? $data['id'] : null;
        $this->storeId = array_key_exists('storeId', $data) ? $data['storeId'] : null;
    }

    public function getId(): int
    {
        return $this->id;
    }
   
    public function getStoreId(): int
    {
        return $this->storeId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ProductModel
    {
        $this->name = $name;
        return $this;
    }
    
    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): ProductModel
    {
        $this->price = $price;
        return $this;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): ProductModel
    {
        $this->amount = $amount;
        return $this;
    }


}

