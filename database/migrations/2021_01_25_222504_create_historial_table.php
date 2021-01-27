<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            $table->id('idHistorial');
            $table->date('fecha');
            $table->integer('checkins');
            $table->integer('checkouts');
            $table->integer('pernoctaciones');
            $table->integer('nacionales');
            $table->integer('extranjeros');
            $table->integer('habitaciones_ocupadas');
            $table->integer('habitaciones_disponibles');
            $table->string('tipo_tarifa');
            $table->double('tarifa_promedio');
            $table->double('tar_per');
            $table->double('ventas_netas');
            $table->double('porcentaje_ocupacion');
            $table->double('revpar');
            $table->integer('empleados_temporales');
            $table->string('estado');
            $table->string('opciones');
            $table->unsignedBigInteger('Hotel_idHotel')->nullable($value=true);
            $table->foreign('Hotel_idHotel')->references('idHotel')->on('hotel')->onDelete('cascade');
            $table->unsignedBigInteger('Historial_idArchivo')->nullable($value=true);  
            $table->foreign('Historial_idArchivo')->references('id')->on('files')->onDelete('cascade');           
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
        Schema::dropIfExists('historial');
    }
}
