<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){ //View Login 
        return view('Login.form'); //Folder and file (Route)
      }
  
}
