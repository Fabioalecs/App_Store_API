<?php

namespace App\Models\MySQL\GerenciadorDeLojas; 

final Class StoreModel 
{

    
    /**
     * @var int
     */
    
    private $id;
    
    /**
     * @var string
     */
    
     private $name;
    
     /**
     * @var string
     */
    private $telephone;
    
    /**
     * @var string
     */
    private $address; 
    
    
    public function __construct(array $data = null)
    {
        $this->id = $data['id'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): StoreModel
    {
        $this->name = $name;
        return $this;
    }
    
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): StoreModel
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): StoreModel
    {
        $this->address = $address;
        return $this;
    }


}

