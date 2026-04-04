<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        // ─── CRÉATION TABLE RECLAMATIONS ──────────────────────────────────────
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            
            // ─── INFORMATIONS PERSONNELLES ────────────────────────────────────
            $table->string('civilite', 10); // M., Mme, Mlle, Dr, Pr
            $table->string('nom', 255);
            $table->string('prenom', 255);
            $table->string('email', 255);
            $table->string('telephone', 20);
            
            // ─── CONTENUS DE LA RÉCLAMATION ───────────────────────────────────
            $table->string('objet', 100); // Qualite_service, Probleme_technique, etc.
            $table->text('description');
            
            // ─── STATUT ET GESTION ────────────────────────────────────────────
            $table->string('statut', 50)->default('En attente'); // En attente, En traitement, Traitée, Fermée
            $table->timestamp('date_traitement')->nullable();
            $table->text('notes_admin')->nullable();
            
            // ─── HORODATAGE ───────────────────────────────────────────────────
            $table->timestamps();
            
            // ─── INDEX POUR OPTIMISATION ──────────────────────────────────────
            $table->index('email');
            $table->index('statut');
            $table->index('created_at');
        });
    }

    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamations');
    }
};
