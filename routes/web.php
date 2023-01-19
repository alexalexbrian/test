<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;

use App\Http\Controllers\TemplateController;



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





Route::get('/template',[TemplateController::class,'template_inicio']);
Route::get('/template/stact',[TemplateController::class,'template_stack']);


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