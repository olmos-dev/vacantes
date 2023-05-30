<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Ubicacion;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        /**Consulta solo con relaciones */
        //$vacantes = Vacante::where('activa',1)->orderBy('created_at','desc')->take(10)->get();
        //return $vacantes;

        /**Consulta eager loading */
        $vacantes = Vacante::with('categoria:id,nombre','ubicacion:id,nombre','experiencia:id,nombre')->where('activa',1)->orderBy('created_at','desc')->take(10)->get();
        $ubicaciones = Ubicacion::orderBy('nombre','asc')->get(['id','nombre']);

        return view('Inicio.index',compact('vacantes','ubicaciones'));
    }
}
