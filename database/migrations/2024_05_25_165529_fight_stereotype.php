<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fight_stereotype', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FightSkill::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Stereotype::class)->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fight_stereotype');
    }
};
