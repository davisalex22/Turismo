<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = "historial";

    protected $fillable =  ['fecha','checkins','checkouts','pernoctaciones','nacionales','extranjeros','habitaciones_ocupadas','habitaciones_disponibles',
                            'tipo_tarifa','tarifa_promedio','tar_per','ventas_netas','porcentaje_ocupacion','revpar','empleados_temporales','estado','opciones'];

}
