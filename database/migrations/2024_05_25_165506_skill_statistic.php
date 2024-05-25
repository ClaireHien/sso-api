<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('skill_statistic', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Skill::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Statistic::class)->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('skill_statistic');
    }
};
