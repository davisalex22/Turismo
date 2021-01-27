<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();        
        // return view('admin.Archivos')->with('files',$files);
        return view('admin.archivos', compact('files'));
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
         // Metodo para limitar el tamaño de los archivos a cargar
         $max_size = (int)ini_get('upload_max_filesize') *10240;

         $files = $request->file('files');
         
         if($request->hasFile('files')){
             foreach ($files as $file){
                 $fileName = Str::slug($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
                 if(Storage::putFileAs('/public/',$file, $fileName)){
                     File::create([
                         'name' => $fileName
                     ]);
                 }   
             }
             return "Si hay archivos";
         }else{
             return "No se han subido archivos";
         }         
         // Alert::success('Exito', 'Se a subido el archivo');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
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

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
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
        $file = File::whereId($id)->firstOrFail();

        unlink(public_path('storage' . '/' . $file->name));
        $file->delete();
        return "Archivo eliminado con exito";
    }
}
