<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Le indicaremos la extrurura de la tabla, utiliza un objeto Blueprint para la extructura de tus tabla 
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();//fecha 
            $table->string('nombre',100);
            $table->string('slug')->unique(); //Creamos un slug y que sea unico, lo vamos a usar como referencia para una url

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()// el metodo down es para las reversas, para eliminar para volver atras. 
    {
        Schema::dropIfExists('categorias');
    }
}
