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
    Schema::create('activities', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Titre de la formation ou du panel
        $table->text('description')->nullable();
        $table->enum('type', ['formation', 'panel']); // Pour différencier
        $table->enum('status', ['programme', 'en_cours', 'termine'])->default('programme');
        $table->string('support_file')->nullable(); // Fichier joint (PDF, etc.)
        $table->dateTime('date_start')->nullable(); // Date de l'événement
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
