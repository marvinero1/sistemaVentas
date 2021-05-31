<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('num_comprobante');
            $table->string('cantidad_pedido');
            $table->string('codigo_barras');
            $table->double('precio_venta', 8, 2);
            $table->longText('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('imagen_novedad')->nullable();

            $table->unsignedBigInteger('carro_id')->unsigned();
            $table->foreign('carro_id')->references('id')->on('carritos')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('carrito_detalles');
    }
}
