<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidade;
/* use App\Models\Medico; */
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medico.index');
        
        $medicos = Medico::with('especialidade')->get();

        return view('medico.inicio', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidade::all();

        return view('medico.create', compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string',
            'lastnames'        => 'required|string',
            'address'          => 'required|string',
            'phone'            => 'required|numeric',
            'especialidade_id' => 'required|numeric',
        ]);

        $medico = Medico::create([
            'name'             => $request->name,
            'lastnames'        => $request->lastnames,
            'address'          => $request->address,
            'phone'            => $request->phone,
            'especialidade_id' => $request->especialidade_id,
        ]);

        return redirect()->route('medicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medico $medico)
    {
        //
    }
}
