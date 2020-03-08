<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestion_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombreGestion');
            $table->tinyInteger('atendido')->default('0')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('gestion_clientes');
    }
}
