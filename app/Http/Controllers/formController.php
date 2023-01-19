<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    

    public function Form_Class(){


        return view('form.form');


    }


    public function Form_Class_Simple(){


       return view('form.simple');


    }
    


    public function Form_Class_Simple_Post(Request $request){
        /*
        echo $request->input('nombre');
        echo $request->input('correo');
        echo $request->input('nombre');
        */
        
        $validated= $request->validate([
            'nombre' => 'required|min:6',
            'correo' => 'required|email:rfc,dns',
            'descripcion' => 'required',
            'password' => 'required|min:6',
        ],[
            'nombre.required'=>'El campo nombre está vacío',
            'nombre.min'=>'El campo nombre debe tener al menos 6 caracteres',
            'correo.required'=>'El campo correo está vacío',
            'correo.email'=>'EL correo ingresado no es valido',
            'descripcion.required'=>'El campo descripción está vacío',
            'password.required'=>'El campo contraseña está vacio',
            'password.min'=>'El campo contraseña debe tener al menos 6 caracteres',
        ]);
        die("ok");

    }

    public function Form_Class_Flash(){


       return view('form.flash');


    }


    public function Form_Class_Upload(){


        return view('form.upload');




    }






}