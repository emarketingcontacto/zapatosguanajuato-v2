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
        Schema::create('shoe_models', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ej: Bota Vaquera 204
            $table->string('sku')->unique()->nullable(); // Código de barras o modelo
            $table->text('description')->nullable();

            // Relaciones
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->foreignId('material_id')->nullable()->constrained();
            $table->foreignId('season_id')->nullable()->constrained();

            $table->string('image')->nullable();
            $table->decimal('price', 10, 2)->nullable(); // Precio sugerido o de lista
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoe_models');
    }
};
