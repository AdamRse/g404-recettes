<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecettesController extends Controller
{
    public function index(){
        $data = [];
        $jsonRecettes =  Storage::disk('public')->get('recipes.json');
        $recettes = json_decode($jsonRecettes);
        $recette = $recettes["recipes"][rand(0, sizeof($recettes["recipes"])-1)];
        dd($recette);
        $data["recette"]=$recette;
        return view('accueil', $data);
    }
}
