<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('recettes_ingredients', function (Blueprint $table) {
            $table->foreign('recette_id')->references('id')->on('recettes')->onDelete("cascade");
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete("cascade");
        });
        Schema::table('notations', function (Blueprint $table) {
            $table->foreign('recette_id')->references('id')->on('recettes')->onDelete("cascade");
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
