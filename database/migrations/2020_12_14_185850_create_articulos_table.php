<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
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
            $table->unsignedBigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')
            ->references('id')->on('categorias')
            ->onDelete('cascade');

            // $table->unsignedBigInteger('favoritos_id')->nullable();
            // $table->foreign('favoritos_id')->references('id')->on('favoritos')
            // ->onDelete('cascade');

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
        Schema::dropIfExists('articulos');
    }
}
