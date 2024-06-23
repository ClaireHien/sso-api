<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->string('image');
            $table->integer('level');
            $table->integer('xp');
            $table->integer('pc');
            $table->integer('spirit_level');
            $table->integer('affinity');
            $table->integer('pv');
            $table->integer('pv_bonus');
            $table->integer('pv_max');
            $table->integer('pe');
            $table->integer('pe_bonus');
            $table->integer('pe_max');
            $table->integer('pt');
            $table->integer('pt_bonus');
            $table->integer('pt_max');
            $table->integer('speed');
            $table->integer('speed_bonus');
            $table->integer('rm');
            $table->integer('rm_bonus');
            $table->integer('rp');
            $table->integer('rp_bonus');
            $table->string('weapon_name');
            $table->string('weapon_description');
            $table->string('armor_name');
            $table->string('armor_description');
            $table->string('clothe1_name');
            $table->string('clothe1_description');
            $table->string('ornament1_name');
            $table->string('ornament1_description');
            $table->string('clothe2_name');
            $table->string('clothe2_description');
            $table->string('ornament2_name');
            $table->string('ornament2_description');
            $table->string('jewelry1_name');
            $table->string('jewelry1_description');
            $table->string('stone1_name');
            $table->string('stone1_description');
            $table->string('jewelry2_name');
            $table->string('jewelry2_description');
            $table->string('stone2_name');
            $table->string('stone2_description');
            $table->foreignIdFor(\App\Models\Group::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Spirit::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class)->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('characters');
    }
};
