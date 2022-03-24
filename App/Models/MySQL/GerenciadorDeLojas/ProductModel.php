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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
   
    /**
     * @return int
     */
    public function getStoreId(): int
    {
        return $this->storeId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string
     * 
     * @return self
     */
    public function setName(string $name): ProductModel
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string
     * 
     * @return self
     */
    public function setPrice(string $price): ProductModel
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string
     * 
     * @return self
     */
    public function setAmount(string $amount): ProductModel
    {
        $this->amount = $amount;
        return $this;
    }


}

