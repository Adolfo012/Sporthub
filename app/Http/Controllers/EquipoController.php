<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipoRequest;
use App\Models\Equipo;
use App\Models\User;
use Illuminate\Http\Request;


class EquipoController extends Controller
{
    public function index(){ //Homepage Equipos 
        $equipos = Equipo::all(); //Take all Equipos
        //$equipos = Equipo::paginate(); //Take all Equipos by paging

        //return $equipos;
        return view('Equipos.index',compact('equipos')); #Passes records to view
        //return "Homepage Equipos <-";
    }
    public function create(){ //Show the create form 
        return view('Equipos.create');
    }
    public function store(EquipoRequest $request){ //Receives the request fields in ""create form"
        //EquipoRequest -> validate the fields before continuing with the function (App\Http\Requests\EquipoRequest)
        //ADD RECORD (if the fields are valid)

        $equipo = new Equipo();

        $equipo->name = $request->name;
        $equipo->tipoJuego = $request->tipoJuego;


        //$representante = User::where('name',$request->user_id)->first(); //Seartru for the user "Representante" by name"
        //$equipo->user_id = representante->id;
        $equipo->user_id = auth()->user()->id; //Representante ID
        $equipo->save();      

        return redirect()->route('equipos.show',$equipo);
        
    }
    public function show(Equipo $equipo){ //Show a team (Equipo instance) 
        $representante = User::find($equipo->user_id); //Search for the user "Representante" by user_id"
        return view('Equipos.show',compact('equipo','representante')); #Passes records to view
    }

    public function edit(Equipo $equipo){ //Show edit a team
        $representante = User::find($equipo->user_id); //Search for the user "Representante" by user_id"
        return view('Equipos.edit',compact('equipo','representante'));
    }

    public function update(EquipoRequest $request, Equipo $equipo){ //Update a team ($request = Receives the request fields, Equipo instance) 
            //EquipoRequest -> validate the fields before continuing with the function (App\Http\Requests\EquipoRequest)
            //UPDATE RECORD (if the fields are valid)
             $equipo->name = $request->name;
             $equipo->tipoJuego = $request->tipoJuego;
             //$representante = User::where('name',$request->user_id)->first(); //Search for the user "Representante" by name"
             //$equipo->user_id = $representante->id; //Representante ID
             $equipo->user_id = auth()->user()->id; //Representante ID
             $equipo->save();
             return redirect()->route('equipos.show',$equipo);
    }
    public function destroy(Equipo $equipo){  //Delete a team 
          $equipo->delete(); 
          return redirect()->route('equipos.index');
    }
}
