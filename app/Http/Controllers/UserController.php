<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Historial;
use App\Models\Hoteles;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $users = User::all(); 
        $hoteles = Hoteles::all();  
        return view('admin.User')->with('users',$users)
                                 ->with('hoteles',$hoteles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $users -> id = $request -> get('id');
        $users -> name = $request -> get('nombre');
        $users -> email = $request -> get('correo');
        $users -> rol = $request -> get('rol');
        $users -> hotel = $request -> get('hotel');
        $users -> password = bcrypt($request -> get('password'));
        $users -> save();
        return redirect('/admin/users');
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
        $user = User::find($id);
                    
        return view('admin.edit')->with('user',$user);
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
        $user = User::find($id);      
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->rol = $request->get('rol');
        $user->password = bcrypt($request -> get('password'));
        $user->save();
        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id); 
        $user->delete();
        return redirect('/admin/users');
    }
}
