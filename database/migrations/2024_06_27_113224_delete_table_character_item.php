<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        // Supprimer la table character_item
        Schema::dropIfExists('character_item');

        // Ajouter la colonne character_id à la table items
        Schema::table('items', function (Blueprint $table) {
           $table->foreignId('character_id')->constrained()->onDelete('cascade')->after('id'); // Ajoute la colonne après la colonne id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recréer la table character_item
        Schema::create('character_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained()->onDelete('cascade');
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Supprimer la colonne character_id de la table items
        Schema::table('items', function (Blueprint $table) {
            $table->dropConstrainedForeignId('character_id');
        });
    }
};
