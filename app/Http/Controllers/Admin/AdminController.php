<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function archivos(){
        return view('admin.archivos');
    }
    public function metricas(){
        return view('admin.metricas');
    }
  
    public function editUser(){
        return view('admin.editUser');
    }
    public function datosTabla(){
        return view('admin.datosTabla');
    }
    public function hoteles(){     
          
        return view('admin.hoteles');
    }
}
