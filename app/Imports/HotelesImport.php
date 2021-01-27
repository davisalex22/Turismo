<?php

namespace App\Imports;

use App\Models\Hoteles;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

class HotelesImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)    {
        
        foreach($collection as $key=>$value){
            
        if($key==1){
        
            $idE=DB::table('hotel')
            ->select('idHotel')
            ->where('nombre_hotel','=', $value[0] )
            ->get();
            
            if(empty($idE[0]->idHotel) ){
                $clave=0;
            }else{
                $clave = $idE[0]->idHotel;
            }            

            if($clave == 0){
                
                DB::table('hotel')->insert(['nombre_hotel'=> $value[0],'clasificacion'=>$value[1],'categoria'=>$value[2],
                    'num_habitaciones'=>$value[3],'plazas'=>$value[4] ]);
                
                $aux=DB::table('hotel')
                            ->select('idHotel')
                            ->where('nombre_hotel','=', $value[0] )
                            ->get();
                $clave = $aux[0]->idHotel;           
            }
            
        }
        if($key>0)
        { 
            $fechaux = explode('/', $value[5]);
            $fecha = $fechaux[2]."-".$fechaux[1]."-".$fechaux[0];
            DB::table('historial')->insert(['fecha'=> $fecha, 'checkins'=> $value[6],'checkouts'=>$value[7],'pernoctaciones'=>$value[8],
            'nacionales'=>$value[9],'extranjeros'=>$value[10],'habitaciones_ocupadas'=>$value[11],'habitaciones_disponibles'=>$value[12],
            'tipo_tarifa'=>$value[13],'tarifa_promedio'=>$value[14],'tar_per'=>round(($value[16]/$value[8]),2), 'ventas_netas'=>$value[15], 
            'porcentaje_ocupacion'=>$value[17],'revpar'=>$value[18],'empleados_temporales'=>$value[19],
            'estado'=>$value[20], 'opciones'=>$value[21],'Hotel_idHotel'=> $clave]);
        
        }

   }
        
    }
}
