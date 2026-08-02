<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('telephone')->nullable()->after('email');
            $table->string('universite')->nullable()->after('telephone');
            $table->string('statut')->default('en_attente')->after('universite'); // Pour que le bureau valide le compte plus tard
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['telephone', 'universite', 'statut']);
        });
    }
};