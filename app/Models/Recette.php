<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recette extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'preparationTime',
        'cookingTime',
        'serves'
    ];

    protected $casts = [
        'serves' => 'integer',
    ];

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recettes_ingredients');
    }
    public function notations(): HasMany
    {
        return $this->hasMany(Notation::class);
    }
}
