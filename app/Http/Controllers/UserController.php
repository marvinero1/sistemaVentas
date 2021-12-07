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

    public function registerIonic(Request $request){
        $user = User::create($request->all());
        return response()->json($user, 200);
    }   
     public function usuariosStorage(Request $request, $id){
        $user = User::where('email', '=', $id)->first();

        return response()->json($user, 200);
    }

    public function login(Request $request){
        
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            // 'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);

        $user = User::whereEmail($request->email)->first();

        if (!is_null($user)) {
           
           if(Hash::check($request->password, $user->password)){
            $token = $user->createToken('personal')->accessToken;
       
            return response()->json(['res' => true, 'token' => $token, 'message' => "Bienvenido al sistema"]);  
            } 
        } 
    }

    public function logout(){
        $user = auth()->user();
        $user->tokens->each(function ($token, $key){
            $token->delete();
        });
        return response()->json(['res' => true, 'message' => "Adios"]);
    }
}
