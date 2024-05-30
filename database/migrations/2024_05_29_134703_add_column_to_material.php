<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->string('description');

            $table->foreignIdFor(\App\Models\TypeMaterial::class)->cascadeOnDelete();
        });
    }
    
    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropForeign(['type_material_id']);
            $table->dropColumn('type_material_id');

        });
    }
};
