<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('character_statistic', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Character::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Statistic::class)->cascadeOnDelete();
            
            $table->integer('value');
            $table->integer('bonus');
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_statistic');
    }
};
