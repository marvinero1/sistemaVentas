<?php

namespace App\Http\Controllers;
use App\User;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{   
    
   
    public function store(Request $request)
    {   
        
        $request->all();

        //dd($request);
      
        User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'pais' => $request->pais,
            'ciudad' => $request->ciudad,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'rol' => $request->rol,
            // 'imagen' => 'images/default-person.jpg',
            // 'subscripcion' => $request->subscripcion,
            'password' => Hash::make($request->password),
            
        ]); 
        
        session::flash('message','Registro Exisitosamente!');
        return redirect('/cliente_get')->with("message", "Usuario creado exitosamente!");    
    }

    public function getCliente(Request $request){

        $user = User::where('rol', 'cliente')->paginate(10);
        return view('users.clientes', compact('user'));
    }

     public function getDespacho(Request $request){

        $despachos = User::where('rol', 'despacho')->paginate(10);
        return view('users.despacho', compact('despachos'));
    }

    public function registerDespacho(){

       return view('users.register');
    }

    public function registerClient(){

       return view('users.registerClient');
    }

   
}
