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
  public function setName(string $name): UserModel
  {
      $this->name = $name;
      return $this;
  } 

  /**
   * @return string
   */
  public function getEmail(): string
  {
      return $this->email;
  }

  /**
   * @param string
   * 
   * @return self
   */
  public function setEmail(string $email): UserModel
  {
      $this->email = $email;
      return $this;
  }

  /**
   * @return string
   */
  public function getPassword(): string
  {
      return $this->password;
  }

  /**
   * @param string
   * 
   * @return self
   */
  public function setPassword(string $password): UserModel
  {
      $this->password = $password;
      return $this;
  }

}