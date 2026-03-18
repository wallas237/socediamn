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
        Schema::create('abstracts', function (Blueprint $table) {
            $table->id();
            $table->string('civilite');
            $table->string('name');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('pays')->nullable();
            $table->string('fichier')->nullable();
            $table->string('adresse')->nullable();
            $table->text('titre')->nullable();
            $table->text('auteurs')->nullable();
            $table->string('mot_cle')->nullable();
            $table->text('affiliation')->nullable();
            $table->text('theme')->nullable();
            $table->string('type_abstract')->nullable();
            $table->text('resume')->nullable();
            $table->mediumText('introduction')->nullable();
            $table->mediumText('methode')->nullable();
            $table->mediumText('resultat')->nullable();
            $table->mediumText('conclusion')->nullable();
            $table->mediumText('correspondant')->nullable();
            $table->string('email_correspondant')->nullable();
            $table->boolean('confirmation_attestion')->default(0);
            $table->boolean('confirmation_abstract')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abstracts');
    }
};
