<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    

    public function Form_Class(){


        return view('form.form');


    }


    public function Form_Class_Simple(){

        $countries=array(
            array("name"=>"Albania","id"=>"1"),
            array("name"=>"Alemania","id"=>"2"),
            array("name"=>"Andorra","id"=>"3"),
            array("name"=>"Armenia","id"=>"4"),
            array("name"=>"Austria","id"=>"5"),
            array("name"=>"Azerbaiyán","id"=>"6"),
            array("name"=>"Bélgica","id"=>"7"),
            array("name"=>"Bielorrusia","id"=>"8"),
            array("name"=>"Bosnia y Herzegovina","id"=>"9"),
            array("name"=>"Bulgaria","id"=>"10"),
            array("name"=>"Chipre","id"=>"11"),
            array("name"=>"Ciudad del Vaticano","id"=>"12"),
            array("name"=>"Croacia","id"=>"13"),
            array("name"=>"Dinamarca","id"=>"14"),
            array("name"=>"Eslovaquia","id"=>"15"),
            array("name"=>"Eslovenia","id"=>"16"),
            array("name"=>"España","id"=>"17"),
            array("name"=>"Estonia","id"=>"18"),
            array("name"=>"Finlandia","id"=>"19"),
            array("name"=>"Francia","id"=>"20"),
            array("name"=>"Georgia","id"=>"21"),
            array("name"=>"Grecia","id"=>"22"),
            array("name"=>"Hungría","id"=>"23"),
            array("name"=>"Irlanda","id"=>"24"),
            array("name"=>"Islandia","id"=>"25"),
            array("name"=>"Italia","id"=>"26"),
            array("name"=>"Kazajistán","id"=>"27"),
            array("name"=>"Letonia","id"=>"28"),
            array("name"=>"Liechtenstein","id"=>"29"),
            array("name"=>"Lituania","id"=>"30"),
            array("name"=>"Luxemburgo","id"=>"31"),
            array("name"=>"Macedonia del Norte","id"=>"32"),
            array("name"=>"Malta","id"=>"33"),
            array("name"=>"Moldavia","id"=>"34"),
            array("name"=>"Mónaco","id"=>"35"),
            array("name"=>"Montenegro","id"=>"36"),
            array("name"=>"Noruega","id"=>"37"),
            array("name"=>"Países Bajos","id"=>"38"),
            array("name"=>"Polonia","id"=>"39"),
            array("name"=>"Portugal","id"=>"40"),
            array("name"=>"Reino Unido","id"=>"41"),
            array("name"=>"República Checa","id"=>"42"),
            array("name"=>"Rumanía","id"=>"43"),
            array("name"=>"Rusia","id"=>"44"),
            array("name"=>"San Marino","id"=>"45"),
            array("name"=>"Serbia","id"=>"46"),
            array("name"=>"Suecia","id"=>"47"),
            array("name"=>"Suiza","id"=>"48"),
            array("name"=>"Turquía","id"=>"49"),
            array("name"=>"Ucrania","id"=>"50")
        );

        $interests=array(
          
            array('name'=>'Deporte','id'=>'1'),
            array('name'=>'Música','id'=>'2'),
            array('name'=>'Religión','id'=>'3'),
            array('name'=>'Comida','id'=>'4'),
            array('name'=>'Viajes','id'=>'5'),
            array('name'=>'Montañas','id'=>'6'),
            array('name'=>'Natación','id'=>'7'),
            array('name'=>'Programación','id'=>'8'),
            array('name'=>'Cocina','id'=>'9'),
            array('name'=>'Netflix','id'=>'10'),
            array('name'=>'Estudiar','id'=>'11'),
            array('name'=>'Correr','id'=>'12')
        );
        






       return view('form.simple',compact('countries','interests'));

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
            'pais' => 'required'
        ],[
            'nombre.required'=>'El campo nombre está vacío',
            'nombre.min'=>'El campo nombre debe tener al menos 6 caracteres',
            'correo.required'=>'El campo correo está vacío',
            'correo.email'=>'EL correo ingresado no es valido',
            'descripcion.required'=>'El campo descripción está vacío',
            'password.required'=>'El campo contraseña está vacio',
            'password.min'=>'El campo contraseña debe tener al menos 6 caracteres',
            'pais.required'=>'El campo país es requerido',
        ]);

        $interests=array(
          
            array('name'=>'Deporte','id'=>'1'),
            array('name'=>'Música','id'=>'2'),
            array('name'=>'Religión','id'=>'3'),
            array('name'=>'Comida','id'=>'4'),
            array('name'=>'Viajes','id'=>'5'),
            array('name'=>'Montañas','id'=>'6'),
            array('name'=>'Natación','id'=>'7'),
            array('name'=>'Programación','id'=>'8'),
            array('name'=>'Cocina','id'=>'9'),
            array('name'=>'Netflix','id'=>'10'),
            array('name'=>'Estudiar','id'=>'11'),
            array('name'=>'Correr','id'=>'12')
        );


        //print_r($_POST);
        foreach($interests as $key=>$item){


            if(isset($_POST['interests_'.$key])){


                echo $_POST['interests_'.$key];
                echo "<br>";

            }

        }
        die("ok");

    }

    public function Form_Class_Flash(){
       return view('form.flash');
    }

    public function Form_Class_Flash2(Request $request){

        $request->session()->flash('css','primary');
        $request->session()->flash('mensaje','Mostrar un mensaje o una alerta mediante sesión');
        return redirect()->route('Flash3'); //Enviamos el mensaje flash a la vista FLASH 3
        /*
        $request->session()->flash('css1','succes');
        $request->session()->flash('mensaje1',' Selectores CSS - Aprende sobre desarrollo web | MDN');
        return redirect()->route('Flash3'); //Enviamos el mensaje flash a la vista FLASH 3
        */
     }

     public function Form_Class_Flash3(){
        return view('form.flash3');
     }

    public function Form_Class_Upload(){

        
        return view('form.upload');
    }


    public function Form_Class_Upload_post(Request $request){

        //print_r($_FILES);

        $request->validate([

            'foto'=>'required | mimes:jpg,png|max:2040'

        ],[

            'foto.required'=>'Try to upload a photo',
            'foto.mimes'=>'You must upload a jpg or png photo.'

        ]);
       
       //print_r($_FILES);
        switch($_FILES['foto']['type']){

            case 'image/png':
                //echo "ok_1";
                $archivo='Foto_'.time().".png";
            break;
            
            case 'image/jpeg':
                //echo "ok_2";
                $archivo='Foto_'.time().".jpg";
            break;
        }

        //echo $archivo;
        //echo $_FILES['foto']['tmp_name'];
        //echo "<br>";

        $destination="uploads/picture/";
        if(file_exists($destination)){
            //echo "si existe ";
            if(move_uploaded_file($_FILES['foto']['tmp_name'],$destination.$archivo)){
                
                $request->session()->flash('css','primary');
                $request->session()->flash('mensaje','Image uploaded successfully');
                //echo "Movido correctamente";
        
                $request->session()->flash('name_img',''.$archivo.'');
                return redirect()->route('Upload'); //Enviamos el mensaje flash a la vista FLASH 3
                //echo "Movido correctamente";
        
                }else{
                $request->session()->flash('css','danger');
                $request->session()->flash('mensaje','An error occurred when moving the image');
                return redirect()->route('Upload'); //Enviamos el mensaje flash a la vista FLASH 3
                //echo "Movido correctamente";
                }

        }else{
       // echo "No existe la ruta";
       
        if(!mkdir($destination, 0777, true)) {
            die('Fallo al crear las carpetas...');
        }else{

            $request->session()->flash('css','warning');
            $request->session()->flash('mensaje','Upps!! Intenta de nuevo se ha creado una nueva carpeta para almacenar las imágenes.');
            return redirect()->route('Upload'); //Enviamos el mensaje flash a la vista FLASH 3

        }
        
        }
    }
}