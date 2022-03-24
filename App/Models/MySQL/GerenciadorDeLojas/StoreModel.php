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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function setName(string $name): StoreModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string
     * 
     * @return self
     */
    public function setTelephone(string $telephone): StoreModel
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string
     * 
     * @return self
     */
    public function setAddress(string $address): StoreModel
    {
        $this->address = $address;
        return $this;
    }


}

