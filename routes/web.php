<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;

use App\Http\Controllers\TemplateController;
use App\Http\Controllers\formController;
use App\Http\Controllers\HelperControler;
use App\Http\Controllers\EmailController;
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



/*
Route::get('/', function () {
    return view('welcome');
});
*/