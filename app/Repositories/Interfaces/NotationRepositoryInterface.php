<?php

namespace App\Repositories\Interfaces;

interface NotationRepositoryInterface
{
    public function create(array $data):bool;
    public function hasUserAlreadyRated(int $recetteId):bool;
}
