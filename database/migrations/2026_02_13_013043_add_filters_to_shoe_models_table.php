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
        Schema::table('shoe_models', function (Blueprint $table) {
            // El Género como campo de selección fija
            $table->string('gender')->nullable()->after('name');
            // La Subcategoría como relación
            $table->foreignId('subcategory_id')->after('gender')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shoe_models', function (Blueprint $table) {
            //
        });
    }
};
