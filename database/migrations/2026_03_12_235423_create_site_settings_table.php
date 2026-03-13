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
        Schema::create('site_settings', function (Blueprint $table) {
           $table->id();
        $table->string('key')->unique(); // Ej: 'whatsapp', 'facebook', 'telefono_contacto'
        $table->text('value')->nullable(); // Aquí guardaremos el dato real
        $table->string('label')->nullable(); // Un nombre amigable para mostrar en el admin: "Número de WhatsApp"
        $table->string('type')->default('text'); // Para saber si es un campo de texto, url, etc.
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
