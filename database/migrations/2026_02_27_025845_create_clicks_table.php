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
        Schema::create('clicks', function (Blueprint $table) {
           $table->id();
            // Relación con el negocio
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            // Tipo de click: 'whatsapp', 'website', 'phone' (escalable para el futuro)
            $table->string('click_type')->default('whatsapp');
            // Datos extra para reportes (opcional pero útil)
            $table->string('platform')->nullable(); // 'mobile', 'desktop'
            $table->string('ip_address')->nullable(); // Para evitar fraude de clicks
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clicks');
    }
};
