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
        Schema::create('ajouter_detail_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('libelle_detail_session');
            $table->string('libelle_salle');
            $table->string('orateur', 255);
            $table->unsignedBigInteger('communication_salle_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajouter_detail_sessions');
    }
};
