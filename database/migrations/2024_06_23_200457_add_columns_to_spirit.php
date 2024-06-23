<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('spirits', function (Blueprint $table) {
            $table->string('skill_name');
            $table->string('upgrade_name');
            $table->string('ultimate_name');
            $table->string('quest1_name');
            $table->string('quest2_name');
            $table->string('quest3_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spirits', function (Blueprint $table) {
            $table->dropColumn('skill_name');
            $table->dropColumn('upgrade_name');
            $table->dropColumn('ultimate_name');
            $table->dropColumn('quest1_name');
            $table->dropColumn('quest2_name');
            $table->dropColumn('quest3_name');
        });
    }
};
