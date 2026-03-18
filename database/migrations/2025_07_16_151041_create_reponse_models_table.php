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
        Schema::create('reponse_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquete_model_id');
            $table->unsignedBigInteger('question_model_id');
            $table->integer('note');
            $table->foreign('question_model_id')->references('id')->on('question_models');
            $table->foreign('enquete_model_id')->references('id')->on('enquete_models');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponse_models');
    }
};
