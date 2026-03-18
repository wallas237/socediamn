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
        Schema::create('evaluation_organisations', function (Blueprint $table) {
            $table->id();
            $table->integer('note_restauration');
            $table->integer('note_organisation_generale');
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
        Schema::dropIfExists('evaluation_organisations');
    }
};
