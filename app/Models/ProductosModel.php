<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CategoriasModel;


class ProductosModel extends Model
{
    use HasFactory;
        //va ser un arreglo vacio, para que no me 
    //obligue a crear otras configuraciones
    //como por ejemplo el campo timestamp o un insert en la tabla
    protected $guarded=[];
    //Para que no cree los campos por defecto
    public $timestamps=false;
    //Nombre de la tabla
    protected $table = 'productos';

  
  
  
    public function categorias(){

                              
        return $this->belongsTo(CategoriasModel::class);



    }



}
