<?php

namespace App\Exports;

use App\Models\Archivo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArchivoExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return['id','establecimiento','clasificacion','categoria','habitaciones','plazas','fecha',
               'checkins','checkouts','pernoctaciones','nacionales','extranjeros','habitacionesOcupadas',
               'habitacionesDisponibles','tipoTarifa','tarifaPromedio','tarPer','ventasNetas',
               'porcentajeOcupacion','revpar','empleadosTemporales','estado','opciones'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // return Archivo::all();
       return collect(Archivo::getArchivo());
    }
}
