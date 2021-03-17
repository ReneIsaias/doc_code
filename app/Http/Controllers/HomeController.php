<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* Redirige al usuario a la vista que le correspone */
    public function index()
    {
        $user = Auth::user()->id;

        $usuario = User::with('roles')->where('id', $user)->firstOrFail();

        if(isset($usuario->roles[0]->name)){
            $rol = $usuario->roles[0]->name;
        }else{
            $rol = 'no hay rol';
        }
        

        if($rol == 'Administrador'){
            $message = 'El usuario tiene el rol de Administrador';
            return view('home', compact('message'));

        }else if($rol == 'Doctor'){
            $message = 'El usuario tiene el rol de Doctor';
            return view('home', compact('message'));

        }else if($rol == 'Paciente'){
            $message = 'El usuario tiene el rol de Paciente';
            return view('home', compact('message'));
            
        }else{
            $message = 'El usuario tiene el rol de nada';
            return view('home', compact('message'));
        }
    }
}
