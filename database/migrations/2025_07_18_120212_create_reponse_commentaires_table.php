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
        Schema::create('reponse_commentaires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquete_model_id');
            $table->text("reponse_commentaire_libre");
            $table->foreign('enquete_model_id')->references('id')->on('enquete_models');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponse_commentaires');
    }
};
