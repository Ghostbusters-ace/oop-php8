<?php
namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all of entities
     * 
     * @param none
     * @return array
     */
    public function findAll(): array;

    /**
     * Get one entity by its ID
     * 
     * @param int
     * @return Entity
     */
    public function findOne(int $id);
}