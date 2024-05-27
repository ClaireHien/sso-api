<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('statistics', function (Blueprint $table) {
            $table->integer('type');

            $table->string('abbreviation');
        });
    }
    
    public function down(): void
    {
        Schema::table('statistics', function (Blueprint $table) {
            $table->dropColumn('type');

            $table->dropColumn('abbreviation');
        });
    }
};
