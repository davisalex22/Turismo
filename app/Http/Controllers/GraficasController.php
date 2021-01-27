<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Hoteles;
class GraficasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aniosBd = DB::select("SELECT DISTINCT year(fecha) AS years FROM historial");
        $hoteles = Hoteles::all();       
        return view('admin.graficas')->with('hoteles',$hoteles)
                                     ->with('aniosBd',$aniosBd);
    }

    public function filtroGrafica(Request $request){         
        $dateInicio = $request -> get('dateInicio');   
        $dateFin = $request -> get('dateFin');
        $hotelGrafica = $request -> get('hotelGrafica');
        $varGrafica = $request -> get('varGrafica');
        $tipoGrafica = $request -> get('tipoGrafica'); 
        $varX = DB::select("SELECT nombre_hotel,$varGrafica,fecha FROM historial e, hotel h WHERE e.fecha BETWEEN '$dateInicio' AND '$dateFin' AND e.Hotel_idHotel = h.idHotel AND h.nombre_hotel = '$hotelGrafica'");
        $varY = DB::select("SELECT  $varGrafica FROM historial e, hotel h WHERE e.fecha BETWEEN '$dateInicio' AND '$dateFin' AND e.Hotel_idHotel = h.idHotel AND h.nombre_hotel = '$hotelGrafica'");            
        dd($varX);
        $aniosBd = DB::select("SELECT DISTINCT year(fecha) AS years FROM historial");
        $hoteles = Hoteles::all();       
        return view('admin.graficas')->with('hoteles',$hoteles)
                                     ->with('aniosBd',$aniosBd)
                                     ->with('varX',$varX);

    }

    public function all(Request $request)
    {
        $historial = DB::table('historial')
            ->select('historial.*')
            ->orderBy('idHistorial','DESC')
            ->get();          

        return response(json_encode($historial),200)->header('Content-type','text/plain');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
