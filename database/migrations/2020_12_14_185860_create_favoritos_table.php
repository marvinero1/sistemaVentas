<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombre');
            $table->enum('tipo_comprobante', ['factura','recibo','nota']);
            $table->string('num_comprobante');
            $table->date('fecha')->nullable();
            $table->string('cantidad');
            $table->string('unidad');
            $table->double('precio_compra', 8, 2);
            $table->double('precio_venta', 8, 2);
            $table->string('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->enum('flag_carrito', ['true', 'false']);
            $table->enum('novedad', ['true', 'false'])->nullable();

            $table->unsignedBigInteger('articulo_id')->unsigned();
            $table->foreign('articulo_id')->references('id')->on('articulos')
            ->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');

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
        Schema::dropIfExists('favoritos');
    }
}
