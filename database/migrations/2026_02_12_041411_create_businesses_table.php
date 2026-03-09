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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();

            // Ubicación
            $table->string('street_number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city')->default('León');
            $table->string('state')->default('Guanajuato');

            // Contacto
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('image')->nullable();

            // Coordenadas para mapa
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lon', 11, 8)->nullable();

            // Relaciones (Aquí es donde se conectan con las tablas anteriores)
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('sale_type_id')->nullable()->constrained()->onDelete('set null');

            $table->date('last_visit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
