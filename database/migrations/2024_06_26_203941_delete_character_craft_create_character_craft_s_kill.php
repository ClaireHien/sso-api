<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
     public function up()
     {
         // Supprimer la table character_craft
         Schema::dropIfExists('character_craft');
 
         // Créer la table character_craft_skill
         Schema::create('character_craft_skill', function (Blueprint $table) {
             $table->id();
             // Définir les clés étrangères
             $table->foreignId('character_id')->constrained()->onDelete('cascade');
             $table->foreignId('craft_skill_id')->constrained()->onDelete('cascade');
         });
     }
 
     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         // Supprimer la table character_craft_skill
         Schema::dropIfExists('character_craft_skill');
 
         // Recréer la table character_craft si nécessaire
         Schema::create('character_craft', function (Blueprint $table) {
             $table->id();
             $table->foreignId('character_id')->constrained()->onDelete('cascade');
             $table->foreignId('craft_skill_id')->constrained()->onDelete('cascade');
         });
     }
};
