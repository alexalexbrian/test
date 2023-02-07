<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_fotos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->unsignedBigInteger('productos_id');//Creamos el campo de las categorias va tener una llava forania 
            $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade');  //onDelete('cascade');   es para decir el formato de la validación de la llave forania 
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_fotos');
    }
}
