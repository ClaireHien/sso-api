<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('material_tables', function (Blueprint $table) {
            $table->id();
            $table->string('simple');
            $table->string('elegant');
            $table->string('refined');
            $table->foreignIdFor(\App\Models\Material::class)->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('material_tables');
    }
};
