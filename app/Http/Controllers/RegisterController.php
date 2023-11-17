<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index(){ //View Login 
        return view('Login.form'); //Folder and file (Route)
      }
      
    public function register(RegisterRequest $request){ //View Login      
        //Create User
        $user = User::create($request->validated()); //Validate the fields of the registered user (app\Http\Requests\RegisterRequest)
        Session::flash('registro_exitoso', '¡Registro exitoso! Inicia sesión para continuar.'); //Successful registration message in view
        //Redirect to Login
        return redirect('login');
      //$credentials = request();          //Returns the inputs of the view login in "credentials"
    
    }
  
}
