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
        Schema::create('recipes_pec4', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamp('fecha');
            $table->enum('dificultad', ['bajo', 'medio', 'alto']);
            // $table->integer('fk_categoria');

            $table->smallInteger('tiempo');
            $table->longText('ingredientes');
            $table->longText('instrucciones');
            $table->string('imagen');

            //Referencia a Tabla Autor
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users_pec4');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes_pec4');
    }
};
