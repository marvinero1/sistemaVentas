<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{   
    
   
    public function store(Request $request)
    {   
        
        $request->all();

        dd($request);
      
        User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'pais' => $request->pais,
            'ciudad' => $request->ciudad,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'role' => $request->role,
            'imagen' => 'images/default-person.jpg',
            'subscripcion' => $request->subscripcion,
            'password' => Hash::make($request->password),
            
        ]); 
        
        session::flash('message','Usuario Registrado Exisitosamente!');
        return redirect('/login')->with("message", "Usuario creado exitosamente!");  
    }

    public function getCliente(Request $request){

        $user = User::where('rol', 'cliente')->get();
        return view('users.clientes', compact('user'));
    }
}
