<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('produtos_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->double('valor_total', 15,2);
            $table->double('desconto', 15,2);
            $table->double('valor_frete', 15,2);
            $table->double('valor_final', 15,2);
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('produtos_id')->references('id')->on('produtos');
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
        Schema::dropIfExists('compras');
    }
}
