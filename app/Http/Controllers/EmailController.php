<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ExampleMailable;
use Illuminate\Support\Facades\Mail; //Agregar

class EmailController extends Controller
{
    //


    public function ViewMail(){


        return view("email.home");


    }


    public function ViewMailSend(Request $request){


        $html="<h2>Este es el cuerpo del correo</h2><hr/> Hola más texto";
        $correo = new ExampleMailable($html);
        Mail::to("msiasus1234@gmail.com")->send($correo);
        $request->session()->flash('css','primary');
        $request->session()->flash('mensaje','Se envió el correo correctamente.');
        return redirect()->route('ViewMail'); //Enviamos el mensaje flash a la vista FLASH 3


    }




}
