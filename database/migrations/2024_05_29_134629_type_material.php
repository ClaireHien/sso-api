<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('type_materials', function (Blueprint $table) {
            $table->id();
            $table->string('label')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_materials');
    }
};
