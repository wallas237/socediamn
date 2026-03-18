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
        Schema::create('atelier_payant_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('email')->nullable();
            $table->integer('participant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atelier_payant_verifications');
    }
};
