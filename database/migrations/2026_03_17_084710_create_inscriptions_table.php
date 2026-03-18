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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('name');
            $table->string('prenom');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('ville')->nullable();
            $table->string('fichier')->nullable();
            $table->string('pays')->nullable();
            $table->string('charge')->nullable();
            $table->string('gender')->nullable();
            $table->string('labo')->nullable();
            $table->integer('grade')->nullable();
            $table->integer('specialite')->nullable();
            $table->integer('delegue')->nullable();
            $table->integer('confirmation_inscription')->default(0);
            $table->boolean('confirmation_attestion')->default(0);
            $table->string('ordonnateur')->nullable();
            $table->integer('montant')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
