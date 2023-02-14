<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

//The Str::slug method generates a URL friendly "slug" from the given string:
use Illuminate\Support\Str;
use App\Models\CategoriasModel;
use App\Models\ProductosModel;
use App\Models\ProductosFotosModel;

class BdControllers extends Controller
{
    //

    public function bd(){

        return view("bd.bd");

    }


    //Inicio para ver las categorias
    public function bd_categorias(){

        $datos = CategoriasModel::orderBy('id','desc')->get();
        //dd($datos);
        return view("bd.bd_categorias", compact('datos'));
    }
    //Fin para ver las categorias

    //Vizualizar las categorias 
    public function bd_categorias_add(){


        return view('bd.bd_categoria_add');


       
    }


    //Inicio metodo para guardar nueva categorias
    public function bd_categorias_add_post(Request $request){
        $request->validate([
            'nombre' => 'required | min:6'
        ],[
            'nombre.required'=>'El campo nombre está vacío',
            'nombre.min'=>'El campo nombre debe tener al menos 6 caracteres'
        ]
        );
        //echo "ok";
        //Guardamos los datos en la Base de datos
        CategoriasModel::create([
            'nombre'=>$request->input('nombre'),
            //The Str::slug method generates a URL friendly "slug" from the given string:
            'slug'=>Str::slug($request->input('nombre'),'-'),
        ]);

        //Fin Guardamos los datos en la Base de datos
        $request->session()->flash('css','success');
        $request->session()->flash('mensaje','it has been saved successfully');
        return redirect()->route('bd_categorias_add'); //Enviamos el mensaje flash a la vista FLASH 3
    }
   //Fin Inicio metodo para guardar nueva categorias



    //Inicio Editar registro de la base de datos
    public function bd_categorias_edit($id){

                                                  //Trae un solo registro
        //$categoria=CategoriasModel::where(['id'=> $id])->first();
        $categoria=CategoriasModel::where(['id'=> $id])->firstOrFail();
       
       //d($categoria);
        return view('bd.bd_categorias_edit',compact('categoria'));
        //echo $id;
     
    }
    //fin Editar registro de la base de datos



    //INICIO Actualizar los datos de la base de datos
    public function bd_categorias_edit_post(Request $request, $id){

        $request->validate([
            'nombre' => 'required | min:6'
        ],[
            'nombre.required'=>'El campo nombre está vacío',
            'nombre.min'=>'El campo nombre debe tener al menos 6 caracteres'
        ]
        );

        //Validamos que existe los datos
        //$categoria=CategoriasModel::find($id);  
         $categoria=CategoriasModel::where(['id'=> $id])->firstOrFail(); //de esta menera me aseguro que llega por la url
         $categoria->nombre = $request->input('nombre');
         $categoria->slug = Str::slug($request->input('nombre'),'-');
         $categoria->save();

        //Redirigir ok 
        $request->session()->flash('css','success');
        $request->session()->flash('mensaje','Record updated successfully');
        return redirect()->route('bd_categorias_edit',['id'=>$id]); //Enviamos el mensaje flash a la vista FLASH 3
        
    }
    //Fin INICIO Actualizar los datos de la base de datos




    //Borrar un registro de la base de datos
    public function bd_categorias_delete(Request $request, $id){


       //echo $id;
       //Verificamos que no se ha creado un producto con esa categoria, en caso de que exista no podemos borrar
        if(ProductosModel::where(['categorias_id' => $id])->count()==0){

                CategoriasModel::where(['id'=>$id])->delete();

                  //No se puede borrar el registro
            $request->session()->flash('css','success');
            $request->session()->flash('mensaje',"Category deleted successfully");
            return redirect()->route('bd_categorias'); //Enviamos el mensaje flash a la vista FLASH 3
            
        }else{

            //No se puede borrar el registro
            $request->session()->flash('css','danger');
            $request->session()->flash('mensaje',"Can't delete record");
            return redirect()->route('bd_categorias_add'); //Enviamos el mensaje flash a la vista FLASH 3
            
        }

    }

    //Listar los productos de la base de datos
    public function bd_productos(){


        $datos = ProductosModel::orderBy('id','desc')->get();
        //dd($datos);
        return view('bd.bd_productos', compact('datos'));



    }




    //Agregar un producto a la base de datos
    public function bd_productos_add(){

        //Obtenemos las categorias para obtenerlas en la hoja productos
        $categorias = CategoriasModel::get();
        //dd($categorias);
        return view("bd.bd_productos_add",compact('categorias'));
    }



    public static function bd_valida_productos_add_post($request){

        $request->validate([
            'categorias_id'=>'required',
            'nombre' => 'required | min:6',
            'precio' => 'required | numeric',
            'descripcion' => 'required'
        ],[
            'categorias_id.required'=>'Select a category',
            'nombre.required' => 'Name is empty',
            'nombre.min' => 'Name must have at least 6 characters',
            'precio.required' => 'Price field is empty',
            'precio.numeric' => 'Price entered is not valid',
            'descripcion.required' => 'Description field is empty'
        ]);


    }


    
    public function bd_productos_add_post(Request $request){

        //VALIDAR 
        //EJECUTAR 
        //REDIRECCIONAR 
       /*
        $request->validate([
            'categorias_id'=>'required',
            'nombre' => 'required | min:6',
            'precio' => 'required | numeric',
            'descripcion' => 'required'
        ],[
            'categorias_id.required'=>'Select a category',
            'nombre.required' => 'Name is empty',
            'nombre.min' => 'Name must have at least 6 characters',
            'precio.required' => 'Price field is empty',
            'precio.numeric' => 'Price entered is not valid',
            'descripcion.required' => 'Description field is empty'
        ]);
        */
        //Metodo estatico para validar los datos
        $valida=$this->bd_valida_productos_add_post($request);

        ProductosModel::create([
            'nombre'=>$request->input('nombre'),
            //The Str::slug method generates a URL friendly "slug" from the given string:
            //slug con helpers de laravel
            'slug'=>Str::slug($request->input('nombre'),'-'),
            'descripcion' =>$request->input('descripcion'),
            'fecha'=>date('Y-m-d'),
            'precio' => $request->input('precio'),
            'categorias_id'=>$request->input('categorias_id'),
            'stock' =>  $request->input('stock'),
           
        ]);

        //REDIRECCIONAR 
        $request->session()->flash('css','success');
        $request->session()->flash('mensaje',"Product added successfully");
        return redirect()->route('bd_productos_add'); //Enviamos el mensaje flash a la vista FLASH 3
    
    }

                   
    public function bd_productos_edit($id){


     
    //echo $id;
    $producto=ProductosModel::where(['id'=> $id])->firstOrFail();
    $categorias = CategoriasModel::get();
    //dd($producto);
    return view("bd.bd_productos_edit",compact('producto','categorias'));
   
    }


    public function bd_productos_edit_post(Request $request, $id){


       //Validamos los datos con el metodo estatico para validar
       $this->bd_valida_productos_add_post($request);
       /*
       $request->validate([
        'categorias_id'=>'required',
        'nombre' => 'required | min:6',
        'precio' => 'required | numeric',
        'descripcion' => 'required'
    ],[
        'categorias_id.required'=>'Select a category',
        'nombre.required' => 'Name is empty',
        'nombre.min' => 'Name must have at least 6 characters',
        'precio.required' => 'Price field is empty',
        'precio.numeric' => 'Price entered is not valid',
        'descripcion.required' => 'Description field is empty'
    ]);
    */
    //Validamos que llega por url
    $producto=ProductosModel::where(['id'=> $id])->firstOrFail();
    $producto->nombre=$request->input('nombre');
    $producto->slug=Str::slug($request->input('nombre'),'-');
    $producto->categorias_id=$request->input('categorias_id');
    $producto->precio=$request->input('precio');
    $producto->descripcion=$request->input('descripcion');
    $producto->save();


    //REDIRECCIONAR 
    $request->session()->flash('css','success');
    $request->session()->flash('mensaje',"Product added successfully");
    return redirect()->route('bd_productos_edit',['id'=>$id]); //Enviamos el mensaje flash a la vista FLASH 3
        

    }


    public function bd_productos_delete(Request $request, $id){


           $producto=ProductosModel::where(['id'=> $id])->firstOrFail();
           if(!ProductosModel::where(['id'=>$id])->count() == 0){



            //Verificamos que el registro no existe en la base de datos fotos
            if(ProductosFotosModel::where(['productos_id'=>$id])->count()==0){


                //Borramos el registro
                if(ProductosModel::where(['id'=> $id])->delete() == 1){
                    //Producto borrado correctamente
                    $request->session()->flash('css','success');
                    $request->session()->flash('mensaje',"Product successfully deleted");
                    return redirect()->route('bd_productos'); //Enviamos el mensaje flash a la vista FLASH 3
                   }



            }else{


                        //No se puede borrar el registro tienes que borrar la foto primero
                        $request->session()->flash('css','danger');
                        $request->session()->flash('mensaje',"You have to delete the photos first");
                        return redirect()->route('bd_productos'); //Enviamos el mensaje flash a la vista FLASH 3


            }


         }else{


                //No se puede borrar el registro
                $request->session()->flash('css','danger');
                $request->session()->flash('mensaje',"I can't find the record in the database");
                return redirect()->route('bd_productos'); //Enviamos el mensaje flash a la vista FLASH 3
                


         }

    }



    //Filtrar por categorias
    public function bd_productos_categorias($id){


        $categorias=CategoriasModel::where(['id' => $id])->firstOrFail();
        //dd($categorias);
        $datos = ProductosModel::where(['categorias_id'=> $id])->orderBy('id','desc')->get();
        //dd($datos);
        return view('bd.bd_productos_por_categoria', compact('categorias', 'datos'));



    }




    public function bd_productos_fotos($id){

        
        $producto = ProductosModel::where(['id'=>$id])->firstOrFail();
        //dd($producto);
        $fotos = ProductosFotosModel::where(['productos_id'=>$id])->get();
        //dd($fotos);
        
        return view('bd.bd_productos_fotos', compact('fotos','producto'));
        //echo "ok";


    }



   
    public function bd_productos_fotos_post(Request $request, $id){

        //Validamo el id que llega por la url
        $producto = ProductosModel::where(['id'=>$id])->firstOrFail();
        //Validamos el formulario
        $request->validate([

            'foto'=>'required | mimes:jpg,png|max:5040'

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

        $destination="uploads/productos/";
        if(file_exists($destination)){
            //echo "si existe ";
            if(move_uploaded_file($_FILES['foto']['tmp_name'],$destination.$archivo)){

                //Insertamos el nombre del fichero a la base de datos
                ProductosFotosModel::create([
                    'productos_id'=> $id,
                    'nombre'=> $archivo
                 ]);
                

                $request->session()->flash('css','primary');
                $request->session()->flash('mensaje','Image uploaded successfully');
                //echo "Movido correctamente";
        
                $request->session()->flash('name_img',''.$archivo.'');
                return redirect()->route('bd_productos_fotos',['id'=>$id]); //Enviamos el mensaje flash a la vista FLASH 3
                //echo "Movido correctamente";
        
                }else{
                $request->session()->flash('css','danger');
                $request->session()->flash('mensaje','An error occurred when moving the image');
                return redirect()->route('bd_productos_fotos',['id'=>$id]); //Enviamos el mensaje flash a la vista FLASH 3
                //echo "Movido correctamente";
                }

        }else{
       // echo "No existe la ruta";
       
        if(!mkdir($destination, 0777, true)) {
            die('Fallo al crear las carpetas...');
        }else{

            $request->session()->flash('css','warning');
            $request->session()->flash('mensaje','Upps!! Intenta de nuevo se ha creado una nueva carpeta para almacenar las imágenes.');
            return redirect()->route('bd_productos_fotos',['id'=>$id]); //Enviamos el mensaje flash a la vista FLASH 3

        }
        
        }



    }



    //Borrar foto de la base de datos
    public function bd_productos_fotos_detele(Request $request,$id_foto,$id_pro){

    //Validar 
    $productoFoto = ProductosFotosModel::where(['id'=>$id_foto])->firstOrFail();
    $ProductosModel = ProductosModel::where(['id'=>$id_pro])->firstOrFail();
    //print_r($foto);
     if(ProductosFotosModel::where(['id'=>$id_foto])->delete()==1){
        //Producto borrado correctamente

        //Borrar imagen
        @unlink("uploads/productos/".$productoFoto->nombre);  
        $request->session()->flash('css','success');
        $request->session()->flash('mensaje',"Product successfully deleted");
        return redirect()->route('bd_productos_fotos',['id'=>$id_pro]); 
     }
        



    }


    


}