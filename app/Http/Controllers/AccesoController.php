<?php

namespace App\Http\Controllers;

//Modelo de usuario para guardar los datos
use App\Models\User;
//importamos los dos modelos user y perfil que se llama metadata. 
use App\Models\Perfil;
use App\Models\UserMetadata;
//Fin importamos los dos modelos user y perfil que se llama metadata.

//importar la clase Hash del namespace 
use Illuminate\Support\Facades\Hash;
/*
En este ejemplo, la función Hash::make() se utiliza para generar un hash de la contraseña 'secretpassword'. 
El hash resultante se almacenaría en la base de datos en lugar de la contraseña en texto claro.
En resumen, use Illuminate\Support\Facades\Hash se utiliza para importar la clase Hash de Laravel, 
que proporciona métodos para generar y verificar contraseñas hash.
*/ 
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AccesoController extends Controller
{
    //

    public function acceso_login(){

        return view("acceso.login");

    }

    public function acceso_login_post(Request $request){

    

      
        $validated = $request->validate([                 
            'correo'=>'required|email:rfc,dns', 
            'password'=>'required|min:6'
        ],[
            'correo.required'=>'correo está vacio',
            'correo.email'=>'correo no es valido',
            'password.required'=>'contraseña esta vacio',
            'password.min'=>'contraseña debe tener al menos 6 caracteres.',

        ]);


      

        if(Auth::attempt(['email' => $request->input('correo'),'password' => $request->input('password')])){

            //Obtenemos el id del usuario logeado
            //echo Auth::id();
            //exit();
            //echo "ok";

            //Esto es una especie de sesion que te presta laravel
            //Auth::id()

            //Obtenemos los datos del usuario
            $usuario = UserMetadata::where(['users_id'=> Auth::id()])->first();
            //Creamos una session perzonalizada
            session(['users_metadata_id'=>$usuario->id]);
            session(['perfil_id'=>$usuario->id]);
            session(['perfil'=>$usuario->id]);

            return redirect()->intended('/template');





        }else{

            $request->session()->flash('css','danger');
            $request->session()->flash('mensaje','The credentials are not valid');
            return redirect()->route('acceso_login'); //Enviamos el mensaje flash a la vista FLASH 3

        }






    }



    

    public function registro_login(){


        return view("acceso.registro");


    }


    public function registro_login_post(Request $request){

        $validated = $request->validate([
            'nombre'=>'required|min:6',                        
            'correo'=>'required|email:rfc,dns|unique:users,email', //importante validación con la tabla users, verifica si el correo existe en la tabla
            'telefono'=>'required',
            'direccion'=>'required',    //confirmed es una valicación propia que tiene laravel va a preguntar si los dos password son iguales.
            'password'=>'required|min:6|confirmed'
        ],[
            'nombre.required'=>'Nombre esta vacio',
            'nombre.min'=>'nombre debe tener al menos 6 caracteres',
            'correo.required'=>'correo está vacio',
            'correo.email'=>'correo no es valido',
            'telefono.required'=>'telefono es requerido',
            'direccion.required'=>'direccion esta vacio',
            'password.required'=>'contraseña esta vacio',
            'password.min'=>'contraseña debe tener al menos 6 caracteres.',
            'password.required'=>'contraseña esta vacio',
            'password.min'=>'contraseña debe tener al menos 6 caracteres.',
            'password.confirmed'=>'la contraseña ingresada no coinciden'
        ]);

       //Guardamos en la base de datos Users
        $user = User::create([
            'name'=>$request->input('nombre'),
            'email'=>$request->input('correo'),
            //'password'=>bycript::make($request->input('password')),
            'password'=>Hash::make($request->input('password')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);


    

    
        //Guardamos en la base de datos UserMetadata:
        UserMetadata::create([
            //Importate obtenemos el id del usuarios que se ha creado arriba
            
            'telefono'=>$request->input('telefono'),
            'direccion'=>$request->input('direccion'),
            'users_id'=>$user->id,
            'perfil_id'=>2
        ]);
     

        $request->session()->flash('css','success');
        $request->session()->flash('mensaje','your account has been created successfully');
        return redirect()->route('registro_login'); //Enviamos el mensaje flash a la vista FLASH 3





    }



    public function cerrar_sesion(){


        return view("acceso.logout");

    }


}
