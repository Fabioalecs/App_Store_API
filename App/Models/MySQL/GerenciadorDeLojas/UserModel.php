<?php

namespace App\Models\MySQL\GerenciadorDeLojas;

final class UserModel
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
  private $email;

  /**
   * @var string
   */
  private $password;

  public function __construct(string $data = null)
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

  public function setName(string $name): UserModel
  {
      $this->name = $name;
      return $this;
  } 

  public function getEmail(): string
  {
      return $this->email;
  }

  public function setEmail(string $email): UserModel
  {
      $this->email = $email;
      return $this;
  }

  public function getPassword(): string
  {
      return $this->password;
  }

  public function setPassword(string $password): UserModel
  {
      $this->password = $password;
      return $this;
  }

}