<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Informante;
use App\Models\Ocupacione;
use App\Models\Escolaridade;
use App\Models\Estado;
use App\Models\Grupo;
use App\Models\Parentesco;

use App\Models\Unidade;
use App\Models\Interrogatorio;
use App\Models\Aparato;
use App\Models\Dato;
use App\Models\Tipo;
use App\Models\Antecedente;
use App\Models\Enfermedade;
use App\Models\Medico;


use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::with('estado','escolaridade','ocupacione','grupo')->get();

        return view('paciente.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ocupaciones   = Ocupacione::all();
        $escolaridades = Escolaridade::all();
        $estados       = Estado::all();
        $grupos        = Grupo::all();
        $parentescos   = Parentesco::all();

        return view('paciente.create', compact('ocupaciones', 'escolaridades', 'estados', 'grupos', 'parentescos'));
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
            'sexo'             => 'required|string',
            'birthday'         => 'required|date',
            'ocupacione_id'    => 'required|numeric',
            'escolaridade_id'  => 'required|numeric',
            'estado_id'        => 'required|numeric',
            'grupo_id'         => 'required|numeric',
            'address'          => 'required|string',
            'nameI'            => 'required|string',
            'lastnamesI'       => 'required|string',
            'phone'            => 'required|numeric',
            'parentesco_id'    => 'required|numeric',
        ]);

        $paciente = Paciente::create([
            'name'             => $request->name,
            'lastnames'        => $request->lastnames,
            'sexo'             => $request->sexo,
            'birthday'         => $request->birthday,
            'age'              => '15',
            'ocupacione_id'    => $request->ocupacione_id,
            'escolaridade_id'  => $request->escolaridade_id,
            'estado_id'        => $request->estado_id,
            'grupo_id'         => $request->grupo_id,
            'address'          => $request->address,
        ]);

        $informante = Informante::create([
            'name'             => $request->nameI,
            'lastnames'        => $request->lastnamesI,
            'phone'            => $request->phone,
            'parentesco_id'    => $request->parentesco_id,
        ]);

        $paciente->informantes()->attach([$informante->id]);

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        $pacientes = Paciente::with('estado','escolaridade','ocupacione','grupo', 'consultas')->where('id', '=', $paciente->id)->get();

        return view('paciente.show', compact('paciente', 'pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        $unidades = Unidade::all();
        $interrogatorios = Interrogatorio::all();
        $aparatos = Aparato::all();
        $datos = Dato::all();
        $tipos = Tipo::all();
        $antecedentes = Antecedente::with('enfermedades')->get();
        $enfermedades = Enfermedade::all();
        $medicos = Medico::all();

        return view('paciente.edit', compact('paciente', 'unidades', 'interrogatorios', 'aparatos', 'datos', 'tipos', 'antecedentes', 'enfermedades', 'medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
