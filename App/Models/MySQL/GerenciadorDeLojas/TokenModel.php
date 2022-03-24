<?php

namespace App\Models\MySQL\GerenciadorDeLojas;

final class TokenModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;
    
    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $refreshToken;

    /**
     * @var string
     */
    private $expiredAt;

    public function __construct(string $userId)
    {
        $this->userId = $userId;
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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getToken(): string 
    {
        return $this->token;
    }

    /**
     * @param string
     * 
     * @return self
     */
    public function setToken(string $token): TokenModel
    {
        $this->token = $token;
        return $this;
    } 

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    /**
     * @param string
     * 
     * @return self
     */
    public function setRefreshToken(string $refreshToken): TokenModel
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpiredAt(): string
    {
        return $this->expiredAt;
    }

    /**
     * @param string
     * 
     * @return self
     */
    public function setExpiredAt(string $expiredAt): TokenModel
    {
        $this->expiredAt = $expiredAt;
        return $this;
    }

}