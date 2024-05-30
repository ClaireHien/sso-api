<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::table('material_tables', function (Blueprint $table) {
            $table->renameColumn('refined', 'wild');
            $table->renameColumn('simple', 'mysterious');
        });
    }

    public function down()
    {
        Schema::table('material_tables', function (Blueprint $table) {
            $table->renameColumn('wild', 'refined');
            $table->renameColumn('mysterious', 'simple');
        });
    }
};
