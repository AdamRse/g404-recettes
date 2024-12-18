<?php

namespace App\Http\Controllers;

use App\Models\Notation;
use App\Models\Recette;
use App\Repositories\Interfaces\RecetteRepositoryInterface;
use App\Services\Interfaces\NotationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RecettesController extends Controller
{
    private $recetteRepository;
    private $notationService;

    //Composition : instanciation des classes par leur interface via le provider
    public function __construct(RecetteRepositoryInterface $recetteRepository, NotationServiceInterface $notationService){
        $this->recetteRepository = $recetteRepository;
        $this->notationService = $notationService;
    }

    //page d'accueil : affiche une recette aléatoire avec ses ingrédients et commentaires
    public function index()
    {
        $data = $this->recetteRepository->getRandomRecette();
        if($data){
            $data['title'] = "Recette aléatoire";
            return view('recipe', $data);
        }
        else
            return view('error', ["message" => "Impossible de trouver une recette"]);
    }

    //Ajoute une notation, accompagnée d'un commentaire optionnel
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'recette_id' => 'integer|exists:recettes,id',
                'comment' => 'nullable|string',
                'note' => 'integer|min:0|max:10'
            ]);

            $this->notationService->addNotation($validated);

            return redirect('/')->with('RegisterSuccess', 'Appréciation ajoutée avec succès');
        } catch (ValidationException $e) {
            return redirect('/')->withErrors($e->errors());
        } catch (\Exception $e) {
            return redirect('/')->withErrors(['error' => $e->getMessage()]);
        }
    }

    //Donne la liste de toutes les recettes avec leurs ingrédients et commentaires
    public function list()
    {
        $recettes = $this->recetteRepository->getAllRecettes();
        return view('recipes', ['recettes' => $recettes]);
    }

    //Affiche unerecette choisie avec ses ingrédients et commentaires glaçants
    public function show($id)
    {
        $data = $this->recetteRepository->getRecetteById($id);

        if ($data) {
            $data['title'] = "Recette " . $data['name'];
            return view('recipe', $data);
        }

        return view('error404', [
            "title" => "Recette introuvable",
            "message" => "Impossible de trouver la recette"
        ]);
    }
}
