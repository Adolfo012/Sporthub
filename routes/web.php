<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EquipoController;
#Cache command: php artisan config:clear or php artisan route:clear

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//Get Arguments --> get(route,NameController::class) || get(route[NameController::class,'functionController'])
//Ex: Route::get('equipos/create',[EquipoController::class,'create']); 
//HomeController 
Route::get('/', HomeController::class);
//LoginController (App\Http\Controllers\LoginController)
Route::get('login', [LoginController::class,'index']);
//RegisterController (App\Http\Controllers\RegisterController)
Route::get('register', [RegisterController::class,'index']);
//EquipoController (App\Http\Controllers\EquipoController)
Route::controller(EquipoController::class)->group(function(){ //Group EquipoController get(route,functionController)
    Route::get('equipos' , 'index'); 
    Route::get('equipos/create','create'); 
    Route::get('equipos/{equipo}','show');  
});


//return view('welcome');



