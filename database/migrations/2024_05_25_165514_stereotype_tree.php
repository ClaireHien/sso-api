<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stereotype_tree', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Tree::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Stereotype::class)->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stereotype_tree');
    }
};
