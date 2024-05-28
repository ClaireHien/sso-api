<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->integer('display');

            $table->integer('price');
        });
    }
    
    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropColumn('display');

            $table->dropColumn('price');
        });
    }

};
