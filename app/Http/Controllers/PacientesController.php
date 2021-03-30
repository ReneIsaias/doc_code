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

use App\Models\Padecimiento;
use App\Models\Consulta;
use App\Models\Diagnostico;
use App\Models\Indicacione;
use App\Models\Pronostico;
use App\Models\Tratamiento;
use Carbon\Carbon;

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
        return view('paciente.index');

        $pacientes = Paciente::with('estado','escolaridade','ocupacione','grupo')->get();

        return view('paciente.inicio', compact('pacientes'));
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
        $padecimientos = Padecimiento::all();

        return view('paciente.edit', compact('paciente', 'unidades', 'interrogatorios', 'aparatos', 'datos', 'tipos', 'antecedentes', 'enfermedades', 'medicos', 'padecimientos'));
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
        /* return $request; */
        $fecha = Carbon::now();

        $consulta = Consulta::create([
            'folio'         => 'consulta' . time(),
            'date'          => $fecha,
            'description'   => $request->padecimiento,
            'status'        => 1
        ]);

        $consulta->pacientes()->attach($paciente->id);

        $consulta->unidades()->attach($request->unidad_id);

        $consulta->medicos()->attach($request->medico_id);

        foreach ($request->enfermedades as $enfermedadeID) {
            $consulta->enfermedades()->attach($enfermedadeID); 
        }

        foreach ($request->description_aparato as $descricionInterrogatorio) {
            $idAparato = 1;
            
            $interrogatorio = Interrogatorio::create([
                'description'   => $descricionInterrogatorio,
            ]);

            $interrogatorio->aparatos()->attach($idAparato);

            $interrogatorio->consultas()->attach($consulta->id);
        }        

        $padecimiento = Padecimiento::create([
            'description'   => $request->padecimiento,
            'status'        => 1,
        ]);

        $consulta->padecimientos()->attach($padecimiento->id);

        $diagnostico = Diagnostico::create([
            'description'   => $request->diagnostico,
            'status'        => 1,
        ]);

        $padecimiento->diagnosticos()->attach($diagnostico->id);

        $indicaciones = Indicacione::create([
            'description'   => $request->indicaciones,
            'status'        => 1,
        ]);

        $diagnostico->indicaciones()->attach($indicaciones->id);

        $tratamiento = Tratamiento::create([
            'description'   => $request->tratamiento,
            'status'        => 1,
        ]);

        $diagnostico->tratamientos()->attach($tratamiento->id);

        $pronosticco = Pronostico::create([
            'description'   => $request->pronostico,
            'status'        => 1,
        ]);

        $diagnostico->pronosticos()->attach($pronosticco->id);

        $diagnostico->medicos()->attach($request->medico_id);

        
        return "se attach todos los datos hasta este punto";
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
