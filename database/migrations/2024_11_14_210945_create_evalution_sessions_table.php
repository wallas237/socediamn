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
        Schema::create('evalution_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('session_id');
            $table->integer('notes');
            $table->datetime('date_heure_debut');
            $table->datetime('date_heure_fin');
            $table->text('remarques')->nullable();
            $table->integer('inscription_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evalution_sessions');
    }
};
