<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helpers;

class HelperControler extends Controller
{
    //

    public function Helper_Inicio(){



           $version = Helpers::getVersion();


           return  view("helper.home",compact('version'));
        


    }






    



}
