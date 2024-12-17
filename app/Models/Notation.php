<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'recette_id',
        'note',
        'comment'
    ];
    protected $casts = [
        'note' => 'integer',
        'recette_id' => 'integer',
    ];

    // Relation avec le modèle Recette
    public function recette(): BelongsTo
    {
        return $this->belongsTo(Recette::class);
    }
}
