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
            $table->foreign('recettes_id')->references('id')->on('recettes')->onDelete("cascade");
            $table->foreign('ingredients_id')->references('id')->on('ingredients')->onDelete("cascade");
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
