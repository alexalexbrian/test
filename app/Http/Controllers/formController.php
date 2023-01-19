<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    

    public function Form_Class(){


        return view('form.form');


    }


    public function Form_Class_Simple(){


        echo "Simple";


    }

    public function Form_Class_Flash(){


        echo "Flash";


    }


    public function Form_Class_Upload(){


        echo "Upload";




    }






}
