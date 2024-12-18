<?php
namespace App\Services;

use App\Services\Interfaces\NotationServiceInterface;
use App\Repositories\Interfaces\NotationRepositoryInterface;

class NotationService implements NotationServiceInterface
{
    private $notationRepository;

    public function __construct(NotationRepositoryInterface $notationRepository){
        $this->notationRepository = $notationRepository;
    }

    //Ajout d'une notation en base de données
    public function addNotation(array $data):void{
        if ($this->notationRepository->hasUserAlreadyRated($data['recette_id'])) {
            throw new \Exception("Cette recette a déjà été notée");
        }
        $this->notationRepository->create($data);
    }
}
