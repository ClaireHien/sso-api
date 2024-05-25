<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('craft_tables', function (Blueprint $table) {
            $table->id();
            $table->string('poor');
            $table->string('fair');
            $table->string('good');
            $table->string('super');
            $table->string('excellent');
            $table->foreignIdFor(\App\Models\Craft::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Material::class)->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('craft_tables');
    }
};
