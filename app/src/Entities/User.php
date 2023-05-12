<?php
namespace App\Entities;

/**
 * User
 * @author DaCoDeMaNiaK <jean-luc@aelion.fr>
 * @version 1.0.0
 * 
 * Entity related to users from database
 */

final class User
{
    /**
     * @property int
     * 
     * ID for user
     */
    private $id;

    /**
     * @property String
     */
    private $username;

    /**
     * @property String
     */
    private $password;

    /**
     * Sets the ID of a user
     * 
     * @param int
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the ID of a user or null if id was not defined
     * 
     * @param none
     * @return int | null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets the username
     * 
     * @param String
     * @return void
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * Get the username
     * 
     * @param void
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Sets the user password
     * 
     * @param String
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Get the user password
     * 
     * @param void
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }
}