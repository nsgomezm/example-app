<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // Cedula
    // Nombre
    // Apellido
    // Fecha de nacimiento
    // Foto / avatar


    public function up(): void
    {
        Schema::create('user_personal_information', function (Blueprint $table) {
            $table->id();
            $table->integer('document_number')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->date('date_born');
            $table->timestamps();
            $table->foreignUuid('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_personal_information');
    }
};
