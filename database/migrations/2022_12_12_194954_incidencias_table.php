<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('descripcion')->nullable();

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            
            $table->unsignedBigInteger('instituto_id');
            $table->foreign('instituto_id')->references('id')->on('institutos')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('aula_id');
            $table->foreign('aula_id')->references('id')->on('Aulas')->onDelete('cascade')->onUpdate('cascade');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
};
