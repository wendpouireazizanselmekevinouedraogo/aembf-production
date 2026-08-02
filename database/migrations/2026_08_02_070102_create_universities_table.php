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
    Schema::create('universities', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nom de l'école/université (ex: 2E, 3I, etc.)
        $table->string('slug')->unique();
        $table->string('location')->nullable(); // Ville ou localisation (ex: Ouagadougou)
        $table->string('logo')->nullable(); // Logo de l'école ou du club
        $table->text('description')->nullable(); // Courte description
        $table->timestamps();
    });
}
};
