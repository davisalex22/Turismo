<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Hoteles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->rol =='Administrador') {
            $historiales = DB::select("SELECT* FROM historial e, hotel h WHERE e.Hotel_idHotel = h.idHotel"); 
            $hoteles = Hoteles::all();              
            return view('admin.datosTabla')->with('historiales',$historiales)
                                           ->with('hoteles',$hoteles)
                                           ->with('hotelSelect','');
        }else{
            $hotelUser = auth()->user()->hotel;
            $historiales = DB::select("SELECT* FROM historial e, hotel h WHERE e.Hotel_idHotel = h.idHotel AND h.nombre_hotel = '$hotelUser'"); 
            return view('admin.datosTabla')->with('historiales',$historiales);
        } 
    }

    public function filtroHotel(Request $request){
        $hotelSelect =$request -> get('filtroHotel');
        $historiales = DB::select("SELECT* FROM historial e, hotel h WHERE e.Hotel_idHotel = h.idHotel AND h.nombre_hotel = '$hotelSelect'");
        $hoteles = Hoteles::all();  
        return view('admin.datosTabla')->with('historiales',$historiales)
                                       ->with('hoteles',$hoteles)
                                       ->with('hotelSelect',$hotelSelect);
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
