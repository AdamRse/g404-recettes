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
        $jsonRecettes =  Storage::disk('public')->get('recipes.json');
        $recettes = json_decode($jsonRecettes)['recipes'];

        foreach($recettes as $recette) {
            $nouvelleRecette = Recette::insertGetId([
                'name' => $recette->name,
                'preparationTime' => $recette->preparationTime,
                'cookingTime' => $recette->cookingTime,
                'serves' => $recette->serves,
            ]);

            foreach ($recette->ingredients as $nomIngredient) {
                $ingredient = Ingredient::firstOrCreate(['name' => $nomIngredient]);

                DB::table('recettes_ingredients')->insert([
                    'recettes_id' => $nouvelleRecette,
                    'ingredients_id' => $ingredient->id
                ]);
            }
        }
    }
}
