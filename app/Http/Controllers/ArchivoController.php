<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Exports\ArchivoExport;
use Excel;
use App\Imports\ArchivoImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\File;
use RealRashid\SweetAlert\Facades\Alert;
class ArchivoController extends Controller
{
    
    public function index()
    {
        $files = File::all();        
        return view('admin.archivos')->with('files',$files);        
    }

    public function addArchivo(){
        $archivos =[
            ["establecimiento"=>"Sonesta","clasificacion"=>"Sonesta","categoria"=>"Sonesta","habitaciones"=>"50",
            "plazas"=>"50","fecha"=>"2020/10/25","checkins"=>"5","checkouts"=>"5","pernoctaciones"=>"5","nacionales"=>"6",
            "extranjeros"=>"8","habitaciones_ocupadas"=>"30","habitaciones_disponibles"=>"6","tipo_tarifa"=>"sonesta", 
            "tarifa_promedio"=>"5.5","tar_per"=>"6.5","ventas_netas"=>"9.6","porcentaje_ocupacion"=>"50.3",
            "revpar"=>"6.5","empleados_temporales"=>"5","estado"=>"Sonesta","opciones"=>"Sonesta"]
        ];
        Archivo::insert($archivos);
        return "Records are inserted";
    }

    public function exportIntoExcel(){
        return Excel::download(new ArchivoExport,'sonestalist.xlsx');
    }
    public function exportIntoCSV(){
        return Excel::download(new ArchivoExport,'sonestalist.csv');
    }
 
    public function import(Request $request){
        
        $files = $request->file('files');
        
        $fecha = new \DateTime();

        foreach($files as $file){
            
            if(Storage::putFileAs('/public/',$file,$fecha->format('d-m-Y').'-'.$file->getClientOriginalName())){
                File::create([
                    'name' => $fecha->format('d-m-Y').'-'.$file->getClientOriginalName()
                ]);
                Excel::import(new ArchivoImport,$file);
            }   
        }
                       
        Alert::success('Archivo/s Cargado/s Correctamente');

        $files = File::all();        
        return view('admin.archivos')->with('files',$files);        
    }
    public function destroy($id)
    {
        $file = File::whereId($id)->firstOrFail();

        unlink(public_path('storage' . '/' . $file->name));
        $file->delete();
        
        Alert::success('Archivo eliminado correctamente');
        $files = File::all();   
        return view('admin.archivos')->with('files',$files);     
    }
}
