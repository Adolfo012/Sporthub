<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){ //View Login 
        return view('Dashboard.dashboard'); //Folder and file (Route)
      }
}
