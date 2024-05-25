<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('neutral_skills', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
        });
    }

    public function down()
    {
        Schema::dropIfExists('neutral_skills');
    }
};
