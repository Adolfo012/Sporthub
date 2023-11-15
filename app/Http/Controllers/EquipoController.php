<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index(){ //Homepage Equipos 
        return "Homepage Equipos <-";
    }
    public function create(){ //Create form 
        return "Forms Equipos";
    }
    public function show($equipo){ //Show a team
        return "Mi equipo: $equipo";
    }
}
