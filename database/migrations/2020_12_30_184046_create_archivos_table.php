<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('establecimiento');
            $table->string('clasificacion');
            $table->string('categoria');
            $table->integer('habitaciones');
            $table->integer('plazas');
            $table->string('fecha');
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
        Schema::dropIfExists('archivos');
    }
}
