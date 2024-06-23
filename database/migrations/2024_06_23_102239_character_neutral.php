<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('character_neutral_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Character::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\NeutralSkill::class)->cascadeOnDelete();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_neutral_skill');
    }
};
