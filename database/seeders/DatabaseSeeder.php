<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recette;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $jsonRecettes = Storage::disk('public')->get('recipes.json');
        $data = json_decode($jsonRecettes, true);
        $recettes = $data['recipes'];

        foreach($recettes as $recette) {

            //dd($recette);
            $nouvelleRecette = Recette::create([
                'name' => $recette["name"],
                'preparationTime' => $recette["preparationTime"],
                'cookingTime' => $recette["cookingTime"],
                'serves' => $recette["serves"],
            ]);
            foreach ($recette["ingredients"] as $nomIngredient) {
                $ingredient = Ingredient::firstOrCreate([
                    'name' => $nomIngredient
                ]);
                $nouvelleRecette->ingredients()->attach($ingredient->id);
            }
        }
    }
}
