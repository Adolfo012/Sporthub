<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartidoRequest;
use App\Models\Partido;
use App\Models\Equipo;
use App\Models\Torneo;

use Illuminate\Http\Request;
#    <p>{{$partidos}}</p>
class PartidoController extends Controller
{
    public function index($torneoID){ //Homepage Partidos 
        #return Torneo::find($torneoID);
        $partidos = Torneo::find($torneoID)->tienenPartidos()->get();
        return view('Partidos.index',compact('partidos','torneoID')); #Passes records to view
    }
    public function create($torneoID){ //Show the create form 
        $equipos = Equipo::all();
        return view('Partidos.create',compact('equipos','torneoID'));
    }
    public function store(PartidoRequest $request, $torneoID){ //Receives the request fields in ""create form"
        //EquipoRequest -> validate the fields before continuing with the function (App\Http\Requests\EquipoRequest)
        //ADD RECORD (if the fields are valid)
        $partido = new Partido();
        $partido->horaPartido = $request->horaPartido;
        $partido->fechaPartido = $request->fechaPartido;
        $partido->jornada = $request->jornada;

        $equipoVis = Equipo::find($request->equipoVisitante_id);
        $partido->equipoVisitante_id = $equipoVis->id;

        $equipoLocal = Equipo::find($request->equipoLocal_id);
        $partido->equipoLocal_id = $equipoLocal->id;
        
        $partido->save();  
        #$torneo = $torneo->id;
        #$torneo->tienen->attach($partido->id);
        $partido->estanTorneos()->attach($torneoID);
        return redirect()->route('partidos.show', ['partido' =>$partido, 'torneoID'=> $torneoID]);
        
    }
    public function show(Partido $partido, $torneoID){ //Show a team (Equipo instance)
        return view('Partidos.show',compact('partido','torneoID')); #Passes records to view
    }

    public function edit(Partido $partido, $torneoID){ //Show edit a team
        $equipos = Equipo::all();
        return view('Partidos.edit',compact('partido','equipos','torneoID'));
    }

    public function update(PartidoRequest $request, Partido $partido, $torneoID){ //Update a team ($request = Receives the request fields, Equipo instance) 
        #return  $partido;
        #$partido = new Partido;
        $partido->fechaPartido = $request->fechaPartido;
        $partido->horaPartido = $request->horaPartido;
        $partido->jornada = $request->jornada;

        $equipoVis = Equipo::find($request->equipoVisitante_id);
        $partido->equipoVisitante_id = $equipoVis->id;

        $equipoLocal = Equipo::find($request->equipoLocal_id);
        $partido->equipoLocal_id = $equipoLocal->id;

        #$partido->id = $request->partido_id;
        #return $partido;
        $partido->save();  
        #$torneo = Torneo::find($torneoID);
        #$torneo->tienenPartidos()->attach($partido->id);
        #$partido->estanTorneos()->attach($torneoID);
        
        return redirect()->route('partidos.show',['partido' =>$partido, 'torneoID'=> $torneoID]);
    }
    public function destroy(Partido $partido, $torneoID){  //Delete a team 
        #$partido->estanTorneos()->detach($torneoID);  
        $partido->delete(); 
        return redirect()->route('partidos.index',$torneoID);
    }
}
