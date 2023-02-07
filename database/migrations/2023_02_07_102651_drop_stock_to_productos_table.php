<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropStockToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            //Eliminar columna 
            $table->dropColumn('stock');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            
            
            //hay que agregar la creación del campo cuando borramos una columna , 
            //porque si despues hacer un Roll Back de tus migraciones esto permite que el campo se vuelva a crear
            //Laravel maneja esta logica 
            $table->bigInteger('stock')->default('0'); 
   


        });
    }
}
