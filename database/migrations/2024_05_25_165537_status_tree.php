<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('status_tree', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Status::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Tree::class)->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_tree');
    }
};
