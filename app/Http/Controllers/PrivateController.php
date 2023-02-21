<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivateController extends Controller
{
    //protegemos la url 1
    public function Page_private_1(){


        return view("private.private-1");


    }

    //Protegemos la url 2
    public function Page_private_2(){



        return view("private.private-2");


    }
}
