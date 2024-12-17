<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecettesController extends Controller
{
    public function index(){
        $data = [];
        $recette = Recette::with(['ingredients', 'notations'])
            ->inRandomOrder()
            ->first();

        if(!$recette)
            $data['error'] = 'Aucune recette trouvée';
        else
            $data = [
                'name' => $recette->name,
                'preparationTime' => $recette->preparationTime,
                'cookingTime' => $recette->cookingTime,
                'serves' => $recette->serves,
                'ingredients' => $recette->ingredients->pluck('name')->toArray(),
                'notations' => $recette->notations->map(function($notation) {
                    return [
                        'note' => $notation->note,
                        'comment' => $notation->comment
                    ];
                })->toArray()
            ];
        return view('accueil', $data);
    }
}
