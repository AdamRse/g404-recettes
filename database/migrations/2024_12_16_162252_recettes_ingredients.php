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
        Schema::create('recettes_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("recettes_id");
            $table->unsignedBigInteger("ingredients_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
