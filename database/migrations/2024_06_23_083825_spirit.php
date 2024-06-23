<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('spirits', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->string('quest_1');
            $table->string('skill');
            $table->string('quest_2');
            $table->string('skill_upgrade');
            $table->string('quest_3');
            $table->string('ultimate_upgrade');
            $table->foreignIdFor(\App\Models\World::class)->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spirits');
    }
};
