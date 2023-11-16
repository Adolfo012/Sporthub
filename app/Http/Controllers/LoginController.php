<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){ //View Login 
      $band = false;
      return view('Login.login',compact('band')); //Folder and file (Route)
    }
    
    public function user_login(){ //View Login 
      $credentials = request()->only('email','password'); //Returns the inputs of the view login in "credentials"
      if (Auth::attempt($credentials)){  //Validates if the user is registered
        //Valid credentials
        request()->session()->regenerate(); //Regenerate Session ID
        return redirect('dashboard');
    }
    //Invalid credentials
    $band = true;
    return view('Login.login',compact('band'));
    }
  
   
}
