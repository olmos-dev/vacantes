<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Categoria $categoria)
    {
        //$vacantes = Vacante::where('categoria_id',$categoria->id)->paginate(10);
        $vacantes = Vacante::with('categoria:id,nombre','ubicacion:id,nombre','experiencia:id,nombre')->where('categoria_id',$categoria->id)->where('activa',1)->paginate(10);
        return view('categoria.index',compact('vacantes','categoria'));
    }
}
