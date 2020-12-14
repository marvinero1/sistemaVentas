<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('tipo_comprobante', ['factura','recibo','nota']);
            $table->string('num_comprobante');
            $table->date('fecha')->nullable();
            $table->date('cantidad')->nullable();
            $table->date('total')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('user')->nullable();

            $table->unsignedBigInteger('articulos_id')->unsigned();
            $table->foreign('articulos_id')
            ->references('id')->on('articulos')
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
        Schema::dropIfExists('ventas');
    }
}
