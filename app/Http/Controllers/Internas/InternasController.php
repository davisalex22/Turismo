<?php

namespace App\Http\Controllers\Internas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InternasController extends Controller
{
    public function home(){
        return view('welcome');
    }    
    public function estadisticas(){
        return view('internas.estadisticas');
    }
    public function lugares(){
        return view('internas.lugares');
    }
    public function contactos(){
        return view('internas.contactos');
    }
}
