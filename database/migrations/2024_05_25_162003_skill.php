<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->string('upgrade');
            $table->string('ultimate_upgrade');
            $table->foreignIdFor(\App\Models\Tree::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\TypeSkill::class)->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('skills');
    }
};
