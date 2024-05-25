<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->string('dice');
            $table->string('ultimate_skill');
            $table->string('ultimate_skill_description');
            $table->string('passive_innate');
            $table->string('passive_innate_description');
            $table->foreignIdFor(\App\Models\Range::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\TypeDamage::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\TypeTree::class)->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trees');
    }
};
