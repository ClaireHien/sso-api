<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('personnal_skills', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->foreignIdFor(\App\Models\TypeSkill::class)->cascadeOnDelete();

        });
    }

    public function down()
    {
        Schema::dropIfExists('personnal_skills');
    }
};
