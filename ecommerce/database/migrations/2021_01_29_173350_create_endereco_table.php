<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->string('lagradouro',80);
            $table->string('complemento',50);
            $table->string('numero',5)->nullable();
            $table->text('referencia')->nullable();
            $table->string('cep', 10);
            $table->string('cidade', 80);
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
        Schema::dropIfExists('endereco');
    }
}
