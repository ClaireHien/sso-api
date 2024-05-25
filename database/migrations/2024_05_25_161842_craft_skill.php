<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('craft_skills', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->foreignIdFor(\App\Models\Craft::class)->cascadeOnDelete();

        });
    }

    public function down()
    {
        Schema::dropIfExists('craft_skills');
    }
};
