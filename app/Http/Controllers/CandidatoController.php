<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Candidato;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;
use App\Http\Requests\CandidatoRequest;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /**Obtener el ID actual de la vacante */
        $vacante_id = $request->id;

        /**Encontar la vacante si no existe lanza error 404*/
        $vacante = Vacante::findOrFail($vacante_id);

        $this->authorize('view',$vacante);

        return view('candidatos.index',compact('vacante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidatoRequest $request)
    {
        $data = $request->validated();
        //ddd($data);

        /**Verifica que existe el pdf*/
        if($request->file('cv')){
            /**Se obtiene el objeto o archivo*/
            $pdf = $request->file('cv');
            /**Se renombra el archivo con un nuevo nombre*/
            $nuevoNombre = time().".".$request->file('cv')->extension();
            /**Se crea la ruta a donde se almacenara el archivo - es necesario php artisan storage:link*/
            $ruta = public_path('/storage/cv');
            /**Se almacenara el pdf en la ruta que definimos con su nuevo nombre*/
            $pdf->move($ruta,$nuevoNombre);
        }

        /**Almacena la informacion del candidato al BD */
        Candidato::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'cv' => $nuevoNombre,
            'vacante_id' => $data['vacante'],
        ]);

        /**Enivar notificacion*/
        $vacante = Vacante::find($data['vacante']);

        /**Reclutador quiere decir que es el usuario por lo tanto de define la relacion*/
        $reclutador = $vacante->reclutador;
        $reclutador->notify(new NuevoCandidato($vacante->titulo,$vacante->id));

        return back()->with('estado','Tus datos fueron enviados correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
