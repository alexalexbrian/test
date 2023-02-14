<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;

use App\Http\Controllers\TemplateController;
use App\Http\Controllers\formController;
use App\Http\Controllers\HelperControler;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\BdControllers;
use App\Http\Controllers\UtilesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/email', [EmailController::class, 'ViewMail'])->name('ViewMail');
Route::get('/email/send/', [EmailController::class, 'ViewMailSend'])->name('ViewMailSend');


Route::get('/helper',[HelperControler::class,'Helper_Inicio'])->name('Helper');

Route::get('/template',[TemplateController::class,'template_inicio']);
Route::get('/template/stact',[TemplateController::class,'template_stack'])->name('Picture');

//FORM FORMULARIOS
Route::get('/form',[formController::class,'Form_Class'])->name('Form');
Route::get('/form/simple',[formController::class,'Form_Class_Simple'])->name('Simple');
//Importante usamos el metodo post para recibir los valores, usamos la misma URL
Route::post('/form/simple',[formController::class,'Form_Class_Simple_Post'])->name('Simple_Post');
//Fin FORM FORMULARIOS

Route::get('/form/upload',[formController::class,'Form_Class_Upload'])->name('Upload');
Route::post('/form/upload_post',[formController::class,'Form_Class_Upload_post'])->name('Upload_post');

//Url para el ejemplo de crear FLASH
Route::get('/form/flash',[formController::class,'Form_Class_Flash'])->name('Flash');
Route::get('/form/flash2',[formController::class,'Form_Class_Flash2'])->name('Flash2');
Route::get('/form/flash3',[formController::class,'Form_Class_Flash3'])->name('Flash3');
//Fin Url para el ejemplo de crear FLASH

                                        //Metodo
Route::get('/',[HomeController::class,'home_inicio'])->name('home_inicio');

                                        //Metodo
Route::get('/incluido',[HomeController::class,'Incluido'])->name('home_incluido');

//Route::get('/',[HomeController::class,'home_inicio'])->name('home_inicio');

           //podemos recibir un valor y slug
                                                      //Metodo                           
Route::get('/parametros/{id}/{slug}',[HomeController::class,'home_parametros'])->name('home_parametros');

Route::get('/bd', [BdControllers::class, 'bd'])->name('bd_index');
Route::get('/bd/categorias', [BdControllers::class, 'bd_categorias'])->name('bd_categorias');

//Ver formulario categoría
Route::get('/bd/categorias/add', [BdControllers::class, 'bd_categorias_add'])->name('bd_categorias_add');
//Guardar categorías
Route::post('/bd/categorias/add', [BdControllers::class, 'bd_categorias_add_post'])->name('bd_categorias_add_post');
//Editar categorias
Route::get('/bd/categorias/add/{id}', [BdControllers::class, 'bd_categorias_edit'])->name('bd_categorias_edit');
Route::post('/bd/categorias/add/{id}', [BdControllers::class, 'bd_categorias_edit_post'])->name('bd_categorias_edit_post');
//Borrar categorias 
Route::get('/bd/categorias/delete/{id}', [BdControllers::class, 'bd_categorias_delete'])->name('bd_categorias_delete');
//Listar productos
Route::get('/bd/productos', [BdControllers::class, 'bd_productos'])->name('bd_productos');

//Agregar productos
Route::get('/bd/productos/add', [BdControllers::class, 'bd_productos_add'])->name('bd_productos_add');
Route::post('/bd/productos/add', [BdControllers::class, 'bd_productos_add_post'])->name('bd_productos_add_post');

//Editar producto de la base de datos
Route::get('/bd/productos/edit/{id}', [BdControllers::class, 'bd_productos_edit'])->name('bd_productos_edit');
Route::post('/bd/productos/edit/{id}', [BdControllers::class, 'bd_productos_edit_post'])->name('bd_productos_edit_post');

//Borrar producto
Route::get('/bd/productos/delete/{id}', [BdControllers::class, 'bd_productos_delete'])->name('bd_productos_delete');


//Filtrar productos
Route::get('/bd/productos/{id}', [BdControllers::class, 'bd_productos_categorias'])->name('bd_productos_categorias');

//Listar foto
Route::get('/bd/productos/fotos/{id}', [BdControllers::class, 'bd_productos_fotos'])->name('bd_productos_fotos');
//Subir la foto usando la misma ruta
Route::post('/bd/productos/fotos/{id}', [BdControllers::class, 'bd_productos_fotos_post'])->name('bd_productos_fotos_post');


//Borrar foto de la base de datos
Route::get('/bd/productos/fotos/detele/{id_foto}/{id_pro}', [BdControllers::class, 'bd_productos_fotos_detele'])->name('bd_productos_fotos_detele');


//Paginación 
Route::get('/bd/produc/paginacion',[BdControllers::class,'bd_paginacion'])->name('bd_productos_paginacion');



//Paginación 
Route::get('/bd/buscador',[BdControllers::class,'bd_productos_buscador'])->name('bd_buscador');


//Utilidades
Route::get('/utiles',[UtilesController::class,'utiles_inicio'])->name('utiles_inicio');

Route::get('/utiles/pdf',[UtilesController::class,'utiles_pdf'])->name('utiles_pdf');

Route::get('/utiles/excel',[UtilesController::class,'utiles_excel'])->name('utiles_excel');



/*
Route::get('/', function () {
    return view('welcome');
});
*/