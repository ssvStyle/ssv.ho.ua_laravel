<?php

namespace App\Repositories\Interfaces;
/**
 *
 * Interface RepositoryInterface
 * @package App\Repositories\Interfaces
 *
 */
interface RepositoryInterface
{

    public function getAll();

    public function getById( string $id );

}