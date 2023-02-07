<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('slug',100)->unique(); //Unique que sea unico. 
            $table->text('descripcion');
            $table->date('fecha')->useCurrent();//Valor por defecto useCurrent() 
            $table->bigInteger('precio')->default('0');//Campo de tipo entero y le agregamos un valor por defecto
            $table->bigInteger('stock')->default('0');
            
            $table->unsignedBigInteger('categorias_id');//Creamos el campo de las categorias va tener una llava forania 
            $table->foreign('categorias_id')->references('id')->on('categorias')->onDelete('cascade');  //onDelete('cascade');   es para decir el formato de la validación de la llave forania 
                                            //Referencia, es la referencia de la otra tabla  y on es el nombre de la otra tabla         
                                            
            //Pensado para la relacion de una a muchas 
            //no complicar de muchos a muchos, despues a nivel de mantenimiento es un problema, mas problemas que soluciones

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
