<?php
namespace App\Services;

use App\Services\Interfaces\NotationServiceInterface;
use App\Repositories\NotationRepositoryInterface;

class NotationService implements NotationServiceInterface
{
    private $notationRepository;

    public function __construct(NotationRepositoryInterface $notationRepository)
    {
        $this->notationRepository = $notationRepository;
    }

    public function addNotation(array $data)
    {
        // Logique métier ici
        if ($this->notationRepository->hasUserAlreadyRated($data['recette_id'])) {
            throw new \Exception("Cette recette a déjà été notée");
        }

        // Création de la notation via le repository
        $notation = $this->notationRepository->create($data);

        // Mise à jour de la note moyenne
        $this->notationRepository->updateAverageRating($data['recette_id']);

        return $notation;
    }
}
