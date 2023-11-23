<?php

namespace App\Http\Controllers;

use App\Http\Requests\TorneoRequest;
use App\Models\Torneo;
use App\Models\User;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $torneos = Torneo::all(); //Take all Equipos

        return view('Torneos.index',compact('torneos')); #Passes records to view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('torneos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TorneoRequest $request)
    {
        $torneo = new Torneo();

        $torneo->name = $request->name;
        $torneo->ubicacion = $request->ubicacion;
        $torneo->tipoJuego = $request->tipoJuego;
        $torneo->descripcion = $request->descripcion;
        $torneo->fechaInicio = $request->fechaInicio;
        $torneo->fechaFin = $request->fechaFin;
        $torneo->tipoTorneo = $request->tipoTorneo;
        $torneo->cantEquipo = $request->cantEquipo;

        $torneo->user_id = auth()->user()->id; //Organizador ID

        $torneo->save();      
        return redirect()->route('torneos.show',$torneo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Torneo $torneo)
    {
        $organizador = User::find($torneo->user_id); //Search for the user "Organizador" by user_id"
        return view('torneos.show',compact('torneo','organizador')); #Passes records to view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Torneo $torneo)
    {
        $organizador = User::find($torneo->user_id); //Search for the user "Organizador" by user_id"
        return view('torneos.edit',compact('torneo','organizador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TorneoRequest $request, Torneo $torneo)
    {
        $torneo->name = $request->name;
        $torneo->ubicacion = $request->ubicacion;
        $torneo->tipoJuego = $request->tipoJuego;
        $torneo->descripcion = $request->descripcion;
        $torneo->fechaInicio = $request->fechaInicio;
        $torneo->fechaFin = $request->fechaFin;
        $torneo->tipoTorneo = $request->tipoTorneo;
        $torneo->user_id = auth()->user()->id; //Organizador ID
        $torneo->cantEquipo = $request->cantEquipo;
        $torneo->save();
        return redirect()->route('torneos.show',$torneo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Torneo $torneo)
    {
        $torneo->delete(); 
        return redirect()->route('torneos.index');
    }
}
