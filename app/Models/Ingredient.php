<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function recettes(): BelongsToMany
    {
        return $this->belongsToMany(Recette::class, 'recettes_ingredients');
    }
}
