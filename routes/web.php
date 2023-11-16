<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\LogoutController; 
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
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
//RegisterController (App\Http\Controllers\RegisterController)

Route::post('login', function(){
    
});
//LoginController (App\Http\Controllers\LoginController)
Route::get('login', [LoginController::class,'index'])->name('login.index');
Route::post('login', [LoginController::class,'user_login'])->name('login.user');
//RegisterController (App\Http\Controllers\RegisterController)
Route::get('register', [RegisterController::class,'index']);
Route::post('register', [RegisterController::class,'register'])->name('register_user');
//LogoutController (App\Http\Controllers\LogoutController)
Route::get('logout', [LogoutController::class,'logout'])->name('logout.index');
//DashboardController (App\Http\Controllers\DashboardController)
Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index');
//EquipoController (App\Http\Controllers\EquipoController)
Route::controller(EquipoController::class)->group(function(){ //Group EquipoController get(route,functionController)
    Route::get('equipos' , 'index')->name('equipos.index');
    Route::get('equipos/create','create')->name('equipos.crear');
    Route::post('equipos/create','equipo_create')->name('equipo_create');
    Route::get('equipos/{equipo}','show')->name('equipos.show');
    Route::get('equipos/{equipo}/edit','edit')->name('equipos.edit');
    Route::put('equipos/{equipo}','update')->name('equipos.update');
});


//return view('welcome');



