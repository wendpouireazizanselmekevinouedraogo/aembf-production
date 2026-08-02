<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('document')->nullable(); // Ajout de la colonne pour le PDF
            $table->text('content')->nullable()->change(); // Rend le texte "au choix"
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('document');
            $table->text('content')->nullable(false)->change();
        });
    }
};