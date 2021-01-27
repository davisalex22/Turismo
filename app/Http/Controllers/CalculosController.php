<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class CalculosController extends Controller
{
    public function index(){

        // Años registrados en la BD
        $aniosBd = DB::select("SELECT DISTINCT year(fecha) AS years FROM historial");
        // Meses registrados en BD
        $mesesBd = DB::select("SELECT DISTINCT month(fecha) AS months FROM historial ORDER BY(month(fecha))");
            // Calculo de huespedes

        // Hotel de 5 estrellas
        $consulta26 = DB::select("SELECT SUM(nacionales) as 'nacionales' , SUM(extranjeros) as 'extranjeros' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' ");

        if($consulta26[0]->nacionales != 0){
            $pNacionales5 = round((100 * $consulta26[0]->nacionales)/($consulta26[0]->nacionales + $consulta26[0]->extranjeros),2);
            }else{
                $pNacionales5 = 50;
        }
        if($consulta26[0]->extranjeros != 0){
            $pExtranjeros5 = round((100 * $consulta26[0]->extranjeros)/($consulta26[0]->nacionales + $consulta26[0]->extranjeros),2);
            }else{
                $pExtranjeros5 = 50;
        }


        // Hotel de 4 estrellas
        $consulta27 = DB::select("SELECT SUM(nacionales) as 'nacionales' , SUM(extranjeros) as 'extranjeros' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas'");
        if($consulta27[0]->nacionales != 0){
            $pNacionales4 = round((100 * $consulta27[0]->nacionales)/($consulta27[0]->nacionales + $consulta27[0]->extranjeros),2);
            }else{
                $pNacionales4 = 50;
        }

        if($consulta27[0]->extranjeros != 0){
            $pExtranjeros4 = round((100 * $consulta27[0]->extranjeros)/($consulta27[0]->nacionales + $consulta27[0]->extranjeros),2);
            }else{
                $pExtranjeros4 = 50;
        }

        // Hotel de 3 estrellas
        $consulta28 = DB::select("SELECT SUM(nacionales) as 'nacionales' , SUM(extranjeros) as 'extranjeros' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' ");
        
        if($consulta28[0]->nacionales != 0){
            $pNacionales3 = round((100 * $consulta28[0]->nacionales)/($consulta28[0]->nacionales + $consulta28[0]->extranjeros),2);
            }else{
                $pNacionales3 = 50;
        }

        if($consulta28[0]->extranjeros != 0){
            $pExtranjeros3 = round((100 * $consulta28[0]->extranjeros)/($consulta28[0]->nacionales + $consulta28[0]->extranjeros),2);
            }else{
                $pExtranjeros3 = 50;
        }

        // Hotel de 2 estrellas
        $consulta29 = DB::select("SELECT SUM(nacionales) as 'nacionales' , SUM(extranjeros) as 'extranjeros' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' ");
        
        if($consulta29[0]->nacionales != 0){
            $pNacionales2 = round((100 * $consulta29[0]->nacionales)/($consulta29[0]->nacionales + $consulta29[0]->extranjeros),2);
            }else{
                $pNacionales2 = 50;
        }

        if($consulta29[0]->extranjeros != 0){
            $pExtranjeros2 = round((100 * $consulta29[0]->extranjeros)/($consulta29[0]->nacionales + $consulta29[0]->extranjeros),2);
            }else{
                $pExtranjeros2 = 50;
        }
        
        

        // Hotel de 1 estrellas
        $consulta30 = DB::select("SELECT SUM(nacionales) as 'nacionales' , SUM(extranjeros) as 'extranjeros' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella'");
           
        if($consulta30[0]->nacionales != 0){
            $pNacionales1 = round((100 * $consulta30[0]->nacionales)/($consulta30[0]->nacionales + $consulta30[0]->extranjeros),2);
            }else{
                $pNacionales1 = 50;
        }

        if($consulta30[0]->extranjeros != 0){
            $pExtranjeros1 = round((100 * $consulta30[0]->extranjeros)/($consulta30[0]->nacionales + $consulta30[0]->extranjeros),2);
            }else{
                $pExtranjeros1 = 50;
        }


        // Calculo de la tarifa promedio 
        // Por habitacion 
        // Hotel de 5 estrellas
        $consulta1 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' AND e.tipo_tarifa = 'Por habitacion' ");
        
        if($consulta1[0]->registros != 0){
            $prom_hab5 = round($consulta1[0]->tarifa_promedio / $consulta1[0]->registros,2);

         }else{
             $prom_hab5 = "No definido";
         }
        // Hotel de 4 estrellas
        $consulta2 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas' AND e.tipo_tarifa = 'Por habitacion'");
        
        if($consulta2[0]->registros != 0){
            $prom_hab4 = round($consulta2[0]->tarifa_promedio / $consulta2[0]->registros,2);

         }else{
             $prom_hab4 = "No definido";
         }

        // Hotel de 3 estrellas
        $consulta3 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' AND e.tipo_tarifa = 'Por habitacion' ");
        

        if($consulta3[0]->registros != 0){
            $prom_hab3 = round($consulta3[0]->tarifa_promedio / $consulta3[0]->registros,2);

         }else{
             $prom_hab3 = "No definido";
         }

        // Hotel de 2 estrellas
        $consulta4 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' AND e.tipo_tarifa = 'Por habitacion' ");

        if($consulta4[0]->registros != 0){
            $prom_hab2 = round($consulta4[0]->tarifa_promedio / $consulta4[0]->registros,2);
         }else{
             $prom_hab2 = "No definido";
         }

        // Hotel de 1 estrellas
        $consulta5 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella' AND e.tipo_tarifa = 'Por habitacion' ");

        if($consulta5[0]->registros != 0){
            $prom_hab1 = round($consulta5[0]->tarifa_promedio / $consulta5[0]->registros,2);
         }else{
             $prom_hab1 = "No definido";
         }
        // Por Persona
        // Hotel de 5 estrellas
        $consulta6 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' AND e.tipo_tarifa = 'Por persona' ");
        
        if($consulta6[0]->registros != 0){
            $prom_per5 = round($consulta6[0]->tarifa_promedio / $consulta6[0]->registros,2);
         }else{
             $prom_per5 = "No definido";
         }
        
        // Hotel de 4 estrellas
         $consulta7 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas' AND e.tipo_tarifa = 'Por persona' ");
         if($consulta7[0]->registros != 0){
            $prom_per4 = round($consulta7[0]->tarifa_promedio / $consulta7[0]->registros,2);
         }else{
             $prom_per4 = "No definido";
         }

        // Hotel de 3 estrellas
        $consulta8 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' AND e.tipo_tarifa = 'Por persona' ");
        if($consulta8[0]->registros != 0){
            $prom_per3 = round($consulta8[0]->tarifa_promedio / $consulta8[0]->registros,2);
        }else{
            $prom_per3 = "No definido";
        }

        // Hotel de 2 estrellas
        $consulta9 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' AND e.tipo_tarifa = 'Por persona' ");
        if($consulta9[0]->registros != 0){
            $prom_per2 = round($consulta9[0]->tarifa_promedio / $consulta9[0]->registros,2);
        }else{
            $prom_per2 = "No definido";
        }

        // Hotel de 1 estrellas
        $consulta10 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella' AND e.tipo_tarifa = 'Por persona' ");
        if($consulta10[0]->registros != 0){
            $prom_per1 = round($consulta10[0]->tarifa_promedio / $consulta10[0]->registros,2);
        }else{
            $prom_per1 = "No definido";
        }

        // Porcentaje ocupacion 
        // hotel 5 estrellas
        $consulta11 = DB::select("SELECT SUM(habitaciones_ocupadas) as 'hab_ocu', SUM(habitaciones_disponibles) as 'hab_disp' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' ");
        
        if($consulta11[0]->hab_disp != 0){
            $porcentaje_ocupacion5 = round($consulta11[0]->hab_ocu /$consulta11[0]->hab_disp,2);

         }else{
            $porcentaje_ocupacion5 = "No definido";
         }
        // hotel 4 estrellas
        $consulta12 = DB::select("SELECT SUM(habitaciones_ocupadas) as 'hab_ocu', SUM(habitaciones_disponibles) as 'hab_disp' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas' ");
        
        if($consulta12[0]->hab_disp != 0){
            $porcentaje_ocupacion4 = round($consulta12[0]->hab_ocu /$consulta12[0]->hab_disp,2);

         }else{
            $porcentaje_ocupacion4 = "No definido";
         }
        // hotel 3 estrellas
        $consulta13 = DB::select("SELECT SUM(habitaciones_ocupadas) as 'hab_ocu', SUM(habitaciones_disponibles) as 'hab_disp' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' ");
        
        if($consulta13[0]->hab_disp != 0){
            $porcentaje_ocupacion3 = round($consulta13[0]->hab_ocu /$consulta13[0]->hab_disp,2);

         }else{
            $porcentaje_ocupacion3 = "No definido";
         }

        // hotel 2 estrellas
        $consulta14 = DB::select("SELECT SUM(habitaciones_ocupadas) as 'hab_ocu', SUM(habitaciones_disponibles) as 'hab_disp' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' ");
        
        if($consulta14[0]->hab_disp != 0){
            $porcentaje_ocupacion2 = round($consulta14[0]->hab_ocu /$consulta14[0]->hab_disp,2);

         }else{
            $porcentaje_ocupacion2 = "No definido";
         }
        // hotel 1 estrella1
        $consulta15 = DB::select("SELECT SUM(habitaciones_ocupadas) as 'hab_ocu', SUM(habitaciones_disponibles) as 'hab_disp' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella' ");
        

        if($consulta15[0]->hab_disp != 0){
            $porcentaje_ocupacion1 = round($consulta15[0]->hab_ocu /$consulta15[0]->hab_disp,2);

         }else{
            $porcentaje_ocupacion1 = "No definido";
         }
        
        
        // Promedio de RevPar

        // Hotel de 5 estrellas
        $consulta16 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.revpar) as 'revpar' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' ");
        
        if($consulta16[0]->revpar != 0){
            $revpar5 = round(($consulta16[0]->revpar)/$consulta16[0]->registros,2);

         }else{
            $revpar5 = "No definido";
         }
        // Hotel de 4 estrellas
        $consulta17 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.revpar) as 'revpar' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas' ");
        
        if($consulta17[0]->revpar != 0){
            $revpar4 = round(($consulta17[0]->revpar)/$consulta17[0]->registros,2);

         }else{
            $revpar4 = "No definido";
         }
        // Hotel de 3 estrellas
        $consulta18 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.revpar) as 'revpar' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' ");
        
        if($consulta18[0]->revpar != 0){
            $revpar3 = round(($consulta18[0]->revpar)/$consulta18[0]->registros,2);

         }else{
            $revpar3 = "No definido";
         }
        // Hotel de 2 estrellas
        $consulta19 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.revpar) as 'revpar' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' ");
        
        if($consulta19[0]->revpar != 0){
            $revpar2 = round(($consulta19[0]->revpar)/$consulta19[0]->registros,2);

         }else{
            $revpar2 = "No definido";
         }

        // Hotel de 1 estrellas
        $consulta20 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.revpar) as 'revpar' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella' ");
        

        if($consulta20[0]->revpar != 0){
            $revpar1 = round(($consulta20[0]->revpar)/$consulta20[0]->registros,2);

         }else{
            $revpar1 = "No definido";
         }

        //Estadia promedio

        // Hotel de 5 estrellas
        $consulta21 = DB::select("SELECT SUM(e.pernoctaciones) as 'pernoctaciones', SUM(e.checkins)  AS 'checkins' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' ");
        
        if($consulta21[0]->pernoctaciones != 0){
            $estadia_promedio5 = round(($consulta21[0]->pernoctaciones)/$consulta21[0]->checkins,2);

         }else{
            $estadia_promedio5 = "No definido";
         }
        // Hotel de 4 estrellas
        $consulta22 = DB::select("SELECT SUM(e.pernoctaciones) as 'pernoctaciones', SUM(e.checkins)  AS 'checkins' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas' ");
        
        if($consulta22[0]->pernoctaciones != 0){
            $estadia_promedio4 = round(($consulta22[0]->pernoctaciones)/$consulta22[0]->checkins,2);

         }else{
            $estadia_promedio4 = "No definido";
         }
        // Hotel de 3 estrellas
        $consulta23 = DB::select("SELECT SUM(e.pernoctaciones) as 'pernoctaciones', SUM(e.checkins)  AS 'checkins' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' ");
        
        if($consulta23[0]->pernoctaciones != 0){
            $estadia_promedio3 = round(($consulta23[0]->pernoctaciones)/$consulta23[0]->checkins,2);

         }else{
            $estadia_promedio3 = "No definido";
         }
        // Hotel de 2 estrellas
        $consulta24 = DB::select("SELECT SUM(e.pernoctaciones) as 'pernoctaciones', SUM(e.checkins)  AS 'checkins' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' ");
        
        if($consulta24[0]->pernoctaciones != 0){
            $estadia_promedio2 = round(($consulta24[0]->pernoctaciones)/$consulta24[0]->checkins,2);

         }else{
            $estadia_promedio2 = "No definido";
         }
        // Hotel de 1 estrellas
        $consulta25 = DB::select("SELECT SUM(e.pernoctaciones) as 'pernoctaciones', SUM(e.checkins)  AS 'checkins' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella' ");
        
        if($consulta25[0]->pernoctaciones != 0){
            $estadia_promedio1 = round(($consulta25[0]->pernoctaciones)/$consulta25[0]->checkins,2);

         }else{
            $estadia_promedio1 = "No definido";
         }
        

         return view('internas.estadisticas')
                                            ->with('mesesBd',$mesesBd)
                                            ->with('aniosBd',$aniosBd )
                                            ->with('pNacionales5',$pNacionales5)
                                            ->with('pExtranjeros5',$pExtranjeros5)
                                            ->with('pNacionales4',$pNacionales4)
                                            ->with('pExtranjeros4',$pExtranjeros4)
                                            ->with('pNacionales3',$pNacionales3)
                                            ->with('pExtranjeros3',$pExtranjeros3)
                                            ->with('pNacionales2',$pNacionales2)
                                            ->with('pExtranjeros2',$pExtranjeros2)
                                            ->with('pNacionales1',$pNacionales1)
                                            ->with('pExtranjeros1',$pExtranjeros1)
                                            ->with('prom_hab5',$prom_hab5)
                                            ->with('prom_hab4',$prom_hab4)
                                            ->with('prom_hab3',$prom_hab3)
                                            ->with('prom_hab2',$prom_hab2)
                                            ->with('prom_hab1',$prom_hab1)
                                            ->with('prom_per5',$prom_per5)
                                            ->with('prom_per4',$prom_per4)
                                            ->with('prom_per3',$prom_per3)
                                            ->with('prom_per2',$prom_per2)
                                            ->with('prom_per1',$prom_per1)
                                            ->with('porcentaje_ocupacion5',$porcentaje_ocupacion5)
                                            ->with('porcentaje_ocupacion4',$porcentaje_ocupacion4)
                                            ->with('porcentaje_ocupacion3',$porcentaje_ocupacion3)
                                            ->with('porcentaje_ocupacion2',$porcentaje_ocupacion2)
                                            ->with('porcentaje_ocupacion1',$porcentaje_ocupacion1)
                                            ->with('revpar5',$revpar5)
                                            ->with('revpar4',$revpar4)
                                            ->with('revpar3',$revpar3)
                                            ->with('revpar2',$revpar2)
                                            ->with('revpar1',$revpar1)
                                            ->with('estadia_promedio5',$estadia_promedio5)
                                            ->with('estadia_promedio4',$estadia_promedio4)
                                            ->with('estadia_promedio3',$estadia_promedio3)
                                            ->with('estadia_promedio2',$estadia_promedio2)
                                            ->with('estadia_promedio1',$estadia_promedio1);
    }

    
    public function filtros(Request $request){
        $anio =$request -> get('anio');
        $mes = $request -> get('mes');
        $consulta1 =  DB::select("SELECT DISTINCT month(fecha) AS months FROM historial WHERE year(fecha) = $anio");
        $aux = sizeof($consulta1);
        $bandera = false;

        
        
        for($i = 0; $i < $aux; $i++){
            if($consulta1[$i]->months == $mes){
                $bandera = true;
            }
        }

        if($bandera){

            // Años registrados en la BD
        $aniosBd = DB::select("SELECT DISTINCT year(fecha) AS years FROM historial");
        // Meses registrados en BD
        $mesesBd = DB::select("SELECT DISTINCT month(fecha) AS months FROM historial ORDER BY(month(fecha))");
            // Calculo de huespedes

        // Hotel de 5 estrellas
        $consulta26 = DB::select("SELECT SUM(nacionales) as 'nacionales' , SUM(extranjeros) as 'extranjeros' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' AND year(fecha) = $anio");
        if($consulta26[0]->nacionales != 0){
            $pNacionales5 = round((100 * $consulta26[0]->nacionales)/($consulta26[0]->nacionales + $consulta26[0]->extranjeros),2);
            }else{
                $pNacionales5 = 50;
        }
        if($consulta26[0]->extranjeros != 0){
            $pExtranjeros5 = round((100 * $consulta26[0]->extranjeros)/($consulta26[0]->nacionales + $consulta26[0]->extranjeros),2);
            }else{
                $pExtranjeros5 = 50;
        }


        // Hotel de 4 estrellas
        $consulta27 = DB::select("SELECT SUM(nacionales) as 'nacionales' , SUM(extranjeros) as 'extranjeros' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas'AND year(fecha) = $anio");
        if($consulta27[0]->nacionales != 0){
            $pNacionales4 = round((100 * $consulta27[0]->nacionales)/($consulta27[0]->nacionales + $consulta27[0]->extranjeros),2);
            }else{
                $pNacionales4 = 50;
        }

        if($consulta27[0]->extranjeros != 0){
            $pExtranjeros4 = round((100 * $consulta27[0]->extranjeros)/($consulta27[0]->nacionales + $consulta27[0]->extranjeros),2);
            }else{
                $pExtranjeros4 = 50;
        }

        // Hotel de 3 estrellas
        $consulta28 = DB::select("SELECT SUM(nacionales) as 'nacionales' , SUM(extranjeros) as 'extranjeros' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' AND year(fecha) = $anio");
        
        if($consulta28[0]->nacionales != 0){
            $pNacionales3 = round((100 * $consulta28[0]->nacionales)/($consulta28[0]->nacionales + $consulta28[0]->extranjeros),2);
            }else{
                $pNacionales3 = 50;
        }

        if($consulta28[0]->extranjeros != 0){
            $pExtranjeros3 = round((100 * $consulta28[0]->extranjeros)/($consulta28[0]->nacionales + $consulta28[0]->extranjeros),2);
            }else{
                $pExtranjeros3 = 50;
        }

        // Hotel de 2 estrellas
        $consulta29 = DB::select("SELECT SUM(nacionales) as 'nacionales' , SUM(extranjeros) as 'extranjeros' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' AND year(fecha) = $anio");
        
        if($consulta29[0]->nacionales != 0){
            $pNacionales2 = round((100 * $consulta29[0]->nacionales)/($consulta29[0]->nacionales + $consulta29[0]->extranjeros),2);
            }else{
                $pNacionales2 = 50;
        }

        if($consulta29[0]->extranjeros != 0){
            $pExtranjeros2 = round((100 * $consulta29[0]->extranjeros)/($consulta29[0]->nacionales + $consulta29[0]->extranjeros),2);
            }else{
                $pExtranjeros2 = 50;
        }
        
        

        // Hotel de 1 estrellas
        $consulta30 = DB::select("SELECT SUM(nacionales) as 'nacionales' , SUM(extranjeros) as 'extranjeros' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella' AND year(fecha) = $anio");
           
        if($consulta30[0]->nacionales != 0){
            $pNacionales1 = round((100 * $consulta30[0]->nacionales)/($consulta30[0]->nacionales + $consulta30[0]->extranjeros),2);
            }else{
                $pNacionales1 = 50;
        }

        if($consulta30[0]->extranjeros != 0){
            $pExtranjeros1 = round((100 * $consulta30[0]->extranjeros)/($consulta30[0]->nacionales + $consulta30[0]->extranjeros),2);
            }else{
                $pExtranjeros1 = 50;
        }


        // Calculo de la tarifa promedio 
        // Por habitacion 
        // Hotel de 5 estrellas
        $consulta1 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' AND e.tipo_tarifa = 'Por habitacion' AND year(fecha) = $anio");
        
        if($consulta1[0]->registros != 0){
            $prom_hab5 = round($consulta1[0]->tarifa_promedio / $consulta1[0]->registros,2);

         }else{
             $prom_hab5 = "No definido";
         }
        // Hotel de 4 estrellas
        $consulta2 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas' AND e.tipo_tarifa = 'Por habitacion' AND year(fecha) = $anio");
        
        if($consulta2[0]->registros != 0){
            $prom_hab4 = round($consulta2[0]->tarifa_promedio / $consulta2[0]->registros,2);

         }else{
             $prom_hab4 = "No definido";
         }

        // Hotel de 3 estrellas
        $consulta3 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' AND e.tipo_tarifa = 'Por habitacion' AND year(fecha) = $anio");
        

        if($consulta3[0]->registros != 0){
            $prom_hab3 = round($consulta3[0]->tarifa_promedio / $consulta3[0]->registros,2);

         }else{
             $prom_hab3 = "No definido";
         }

        // Hotel de 2 estrellas
        $consulta4 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' AND e.tipo_tarifa = 'Por habitacion' AND year(fecha) = $anio");

        if($consulta4[0]->registros != 0){
            $prom_hab2 = round($consulta4[0]->tarifa_promedio / $consulta4[0]->registros,2);
         }else{
             $prom_hab2 = "No definido";
         }

        // Hotel de 1 estrellas
        $consulta5 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella' AND e.tipo_tarifa = 'Por habitacion' AND year(fecha) = $anio");

        if($consulta5[0]->registros != 0){
            $prom_hab1 = round($consulta5[0]->tarifa_promedio / $consulta5[0]->registros,2);
         }else{
             $prom_hab1 = "No definido";
         }
        // Por Persona
        // Hotel de 5 estrellas
        $consulta6 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' AND e.tipo_tarifa = 'Por persona' AND year(fecha) = $anio");
        
        if($consulta6[0]->registros != 0){
            $prom_per5 = round($consulta6[0]->tarifa_promedio / $consulta6[0]->registros,2);
         }else{
             $prom_per5 = "No definido";
         }
        
        // Hotel de 4 estrellas
         $consulta7 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas' AND e.tipo_tarifa = 'Por persona' AND year(fecha) = $anio");
         if($consulta7[0]->registros != 0){
            $prom_per4 = round($consulta7[0]->tarifa_promedio / $consulta7[0]->registros,2);
         }else{
             $prom_per4 = "No definido";
         }

        // Hotel de 3 estrellas
        $consulta8 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' AND e.tipo_tarifa = 'Por persona' AND year(fecha) = $anio");
        if($consulta8[0]->registros != 0){
            $prom_per3 = round($consulta8[0]->tarifa_promedio / $consulta8[0]->registros,2);
        }else{
            $prom_per3 = "No definido";
        }

        // Hotel de 2 estrellas
        $consulta9 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' AND e.tipo_tarifa = 'Por persona' AND year(fecha) = $anio");
        if($consulta9[0]->registros != 0){
            $prom_per2 = round($consulta9[0]->tarifa_promedio / $consulta9[0]->registros,2);
        }else{
            $prom_per2 = "No definido";
        }

        // Hotel de 1 estrellas
        $consulta10 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.tarifa_promedio) as 'tarifa_promedio' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella' AND e.tipo_tarifa = 'Por persona' AND year(fecha) = $anio");
        if($consulta10[0]->registros != 0){
            $prom_per1 = round($consulta10[0]->tarifa_promedio / $consulta10[0]->registros,2);
        }else{
            $prom_per1 = "No definido";
        }

        // Porcentaje ocupacion 
        // hotel 5 estrellas
        $consulta11 = DB::select("SELECT SUM(habitaciones_ocupadas) as 'hab_ocu', SUM(habitaciones_disponibles) as 'hab_disp' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' AND year(fecha) = $anio");
        
        if($consulta11[0]->hab_disp != 0){
            $porcentaje_ocupacion5 = round($consulta11[0]->hab_ocu /$consulta11[0]->hab_disp,2);

         }else{
            $porcentaje_ocupacion5 = "No definido";
         }
        // hotel 4 estrellas
        $consulta12 = DB::select("SELECT SUM(habitaciones_ocupadas) as 'hab_ocu', SUM(habitaciones_disponibles) as 'hab_disp' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas' AND year(fecha) = $anio");
        
        if($consulta12[0]->hab_disp != 0){
            $porcentaje_ocupacion4 = round($consulta12[0]->hab_ocu /$consulta12[0]->hab_disp,2);

         }else{
            $porcentaje_ocupacion4 = "No definido";
         }
        // hotel 3 estrellas
        $consulta13 = DB::select("SELECT SUM(habitaciones_ocupadas) as 'hab_ocu', SUM(habitaciones_disponibles) as 'hab_disp' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' AND year(fecha) = $anio");
        
        if($consulta13[0]->hab_disp != 0){
            $porcentaje_ocupacion3 = round($consulta13[0]->hab_ocu /$consulta13[0]->hab_disp,2);

         }else{
            $porcentaje_ocupacion3 = "No definido";
         }

        // hotel 2 estrellas
        $consulta14 = DB::select("SELECT SUM(habitaciones_ocupadas) as 'hab_ocu', SUM(habitaciones_disponibles) as 'hab_disp' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' AND year(fecha) = $anio");
        
        if($consulta14[0]->hab_disp != 0){
            $porcentaje_ocupacion2 = round($consulta14[0]->hab_ocu /$consulta14[0]->hab_disp,2);

         }else{
            $porcentaje_ocupacion2 = "No definido";
         }
        // hotel 1 estrella1
        $consulta15 = DB::select("SELECT SUM(habitaciones_ocupadas) as 'hab_ocu', SUM(habitaciones_disponibles) as 'hab_disp' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella' AND year(fecha) = $anio");
        

        if($consulta15[0]->hab_disp != 0){
            $porcentaje_ocupacion1 = round($consulta15[0]->hab_ocu /$consulta15[0]->hab_disp,2);

         }else{
            $porcentaje_ocupacion1 = "No definido";
         }
        
        
        // Promedio de RevPar

        // Hotel de 5 estrellas
        $consulta16 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.revpar) as 'revpar' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' AND year(fecha) = $anio");
        
        if($consulta16[0]->revpar != 0){
            $revpar5 = round(($consulta16[0]->revpar)/$consulta16[0]->registros,2);

         }else{
            $revpar5 = "No definido";
         }
        // Hotel de 4 estrellas
        $consulta17 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.revpar) as 'revpar' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas' AND year(fecha) = $anio");
        
        if($consulta17[0]->revpar != 0){
            $revpar4 = round(($consulta17[0]->revpar)/$consulta17[0]->registros,2);

         }else{
            $revpar4 = "No definido";
         }
        // Hotel de 3 estrellas
        $consulta18 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.revpar) as 'revpar' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' AND year(fecha) = $anio");
        
        if($consulta18[0]->revpar != 0){
            $revpar3 = round(($consulta18[0]->revpar)/$consulta18[0]->registros,2);

         }else{
            $revpar3 = "No definido";
         }
        // Hotel de 2 estrellas
        $consulta19 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.revpar) as 'revpar' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' AND year(fecha) = $anio");
        
        if($consulta19[0]->revpar != 0){
            $revpar2 = round(($consulta19[0]->revpar)/$consulta19[0]->registros,2);

         }else{
            $revpar2 = "No definido";
         }

        // Hotel de 1 estrellas
        $consulta20 = DB::select("SELECT COUNT(e.idHistorial) as 'registros', SUM(e.revpar) as 'revpar' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella' AND year(fecha) = $anio");
        

        if($consulta20[0]->revpar != 0){
            $revpar1 = round(($consulta20[0]->revpar)/$consulta20[0]->registros,2);

         }else{
            $revpar1 = "No definido";
         }

        //Estadia promedio

        // Hotel de 5 estrellas
        $consulta21 = DB::select("SELECT SUM(e.pernoctaciones) as 'pernoctaciones', SUM(e.checkins)  AS 'checkins' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '5 Estrellas' AND year(fecha) = $anio");
        
        if($consulta21[0]->pernoctaciones != 0){
            $estadia_promedio5 = round(($consulta21[0]->pernoctaciones)/$consulta21[0]->checkins,2);

         }else{
            $estadia_promedio5 = "No definido";
         }
        // Hotel de 4 estrellas
        $consulta22 = DB::select("SELECT SUM(e.pernoctaciones) as 'pernoctaciones', SUM(e.checkins)  AS 'checkins' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '4 Estrellas' AND year(fecha) = $anio");
        
        if($consulta22[0]->pernoctaciones != 0){
            $estadia_promedio4 = round(($consulta22[0]->pernoctaciones)/$consulta22[0]->checkins,2);

         }else{
            $estadia_promedio4 = "No definido";
         }
        // Hotel de 3 estrellas
        $consulta23 = DB::select("SELECT SUM(e.pernoctaciones) as 'pernoctaciones', SUM(e.checkins)  AS 'checkins' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '3 Estrellas' AND year(fecha) = $anio");
        
        if($consulta23[0]->pernoctaciones != 0){
            $estadia_promedio3 = round(($consulta23[0]->pernoctaciones)/$consulta23[0]->checkins,2);

         }else{
            $estadia_promedio3 = "No definido";
         }
        // Hotel de 2 estrellas
        $consulta24 = DB::select("SELECT SUM(e.pernoctaciones) as 'pernoctaciones', SUM(e.checkins)  AS 'checkins' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '2 Estrellas' AND year(fecha) = $anio");
        
        if($consulta24[0]->pernoctaciones != 0){
            $estadia_promedio2 = round(($consulta24[0]->pernoctaciones)/$consulta24[0]->checkins,2);

         }else{
            $estadia_promedio2 = "No definido";
         }
        // Hotel de 1 estrellas
        $consulta25 = DB::select("SELECT SUM(e.pernoctaciones) as 'pernoctaciones', SUM(e.checkins)  AS 'checkins' from historial e, hotel h where e.Hotel_idHotel = h.idHotel AND categoria = '1 Estrella' AND year(fecha) = $anio");
        $estadia_promedio1 = round(($consulta25[0]->pernoctaciones)/$consulta25[0]->checkins,2);

        if($consulta25[0]->pernoctaciones != 0){
            $estadia_promedio1 = round(($consulta25[0]->pernoctaciones)/$consulta25[0]->checkins,2);

         }else{
            $estadia_promedio1 = "No definido";
         }

        }else{
            $value = [null];
            Validator::make($value,[
                '0' => 'required'
            ],$messages = [
                'required' => 'No hay registros'
            ])->validate();
        }
        

        return view('internas.estadisticas')
                                            ->with('mesesBd',$mesesBd)
                                            ->with('aniosBd',$aniosBd )
                                            ->with('pNacionales5',$pNacionales5)
                                            ->with('pExtranjeros5',$pExtranjeros5)
                                            ->with('pNacionales4',$pNacionales4)
                                            ->with('pExtranjeros4',$pExtranjeros4)
                                            ->with('pNacionales3',$pNacionales3)
                                            ->with('pExtranjeros3',$pExtranjeros3)
                                            ->with('pNacionales2',$pNacionales2)
                                            ->with('pExtranjeros2',$pExtranjeros2)
                                            ->with('pNacionales1',$pNacionales1)
                                            ->with('pExtranjeros1',$pExtranjeros1)
                                            ->with('prom_hab5',$prom_hab5)
                                            ->with('prom_hab4',$prom_hab4)
                                            ->with('prom_hab3',$prom_hab3)
                                            ->with('prom_hab2',$prom_hab2)
                                            ->with('prom_hab1',$prom_hab1)
                                            ->with('prom_per5',$prom_per5)
                                            ->with('prom_per4',$prom_per4)
                                            ->with('prom_per3',$prom_per3)
                                            ->with('prom_per2',$prom_per2)
                                            ->with('prom_per1',$prom_per1)
                                            ->with('porcentaje_ocupacion5',$porcentaje_ocupacion5)
                                            ->with('porcentaje_ocupacion4',$porcentaje_ocupacion4)
                                            ->with('porcentaje_ocupacion3',$porcentaje_ocupacion3)
                                            ->with('porcentaje_ocupacion2',$porcentaje_ocupacion2)
                                            ->with('porcentaje_ocupacion1',$porcentaje_ocupacion1)
                                            ->with('revpar5',$revpar5)
                                            ->with('revpar4',$revpar4)
                                            ->with('revpar3',$revpar3)
                                            ->with('revpar2',$revpar2)
                                            ->with('revpar1',$revpar1)
                                            ->with('estadia_promedio5',$estadia_promedio5)
                                            ->with('estadia_promedio4',$estadia_promedio4)
                                            ->with('estadia_promedio3',$estadia_promedio3)
                                            ->with('estadia_promedio2',$estadia_promedio2)
                                            ->with('estadia_promedio1',$estadia_promedio1);
                                        
    }

}
