<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Salary;
use App\Vacante;
use App\Ubicacion;
use App\Experiencia;
use App\{Categoria};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateVacanteRequest;
use App\Http\Requests\VacanteRequest;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**Consulta a travez de las relaciones */
        //$vacantes = auth()->user()->vacantes;

        /**Consulta a travez de ORM*/
        //$vacantes = Vacante::where('user_id',auth()->user()->id)->simplePaginate(10);
        //ddd($vacantes);
        
        /**Eager Loading*/
        $vacantes = Vacante::with('categoria:id,nombre')->where('user_id',auth()->user()->id)->orderby('created_at','desc')->simplePaginate(10);
        return view('vacantes.index',compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre','asc')->get(['id','nombre']);
        $experiencias = Experiencia::all(['id','nombre']);
        $ubicaciones = Ubicacion::orderBy('nombre','asc')->get(['id','nombre']);
        $salarios = Salary::all(['id','nombre']);
        $skills = Skill::orderBy('nombre','asc')->get(['id','nombre']);
        return view('vacantes.create',compact('categorias','experiencias','ubicaciones','salarios','skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVacanteRequest $request)
    {
        /**Los campos que se han validado se pasan a la variable data*/
        $data = $request->validated();

        /**Se almacenan los datos de la vacante a la BD y en registro
         * pasamos los detalles de la información de ese registro, para 
         * posteriormente saber el ID de la vacante registrada
         */
        $registro = Vacante::create([
            'user_id' => auth()->user()->id,
            'categoria_id' => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id' => $data['ubicacion'],
            'salario_id' => $data['salario'],
            'titulo' => $data['titulo'],
            'imagen' => $data['imagen'],
            'descripcion' => $data['descripcion'],
        ]);

        /**Se busca esta vacante ya almacenada en la BD por el id */
        $vacante = Vacante::find($registro->id);

        /**Se inserta los datos en la tabla pivote con el metodo attach y le pasamos un arreglo como parámetro*/
        $vacante->skills()->attach($data['skills']);

        /**Se redirecciona al listado de las vacantes */
        return redirect()->route('vacantes.index')->with('estado','Vacante '.$registro->titulo.' creada correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {   
        /**Eager Loading*/
        //$vacantes = Vacante::with('skills:id,nombre','categoria:id,nombre','experiencia:id,nombre','ubicacion:id,nombre','salario:id,nombre')->where('id',$vacante->id)->get();
        //return $vacantes;
        //return view('vacantes.show',compact('vacantes'));

        /**Con relaciones */

        if($vacante->activa === 0) 
            return abort(404);
        return view('vacantes.show',compact('vacante'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        $this->authorize('view',$vacante);

        /**Se cargan los datos requeridos para el formulario desde la BD*/
        $categorias = Categoria::orderBy('nombre','asc')->get(['id','nombre']);
        $experiencias = Experiencia::all(['id','nombre']);
        $ubicaciones = Ubicacion::orderBy('nombre','asc')->get(['id','nombre']);
        $salarios = Salary::all(['id','nombre']);
        $skills = Skill::orderBy('nombre','asc')->get(['id','nombre']);

        /**Se declara un arreglo donde se almacene los ID's de las habilidades 
         * de la vacante que se esta editando.
         * la vacante se relaciona con muchas habilidades, por lo tanto, la
         * relacion $vacante->skills obtiene las habilidades que pertenecen 
         * a esa vacante.
         * Por lo consiguiente, se necesita un arrgelo para que cada id de la habilidad
         * sea almacenado y posteriormente enviarlo a la vista
        */
        $habilidades = array();
        $tecnologias = $vacante->skills;
        foreach ($tecnologias as $tecnologia) {
            $habilidades[] = $tecnologia->id;
        }
        //return $habilidades;
        return view('vacantes.edit',compact('vacante','categorias','experiencias','ubicaciones','salarios','skills','habilidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VacanteRequest $request, Vacante $vacante)
    {
        $this->authorize('update',$vacante);

        /**Se obtiene la vacante correspondiente de la BD */
        $registro = Vacante::findOrFail($vacante->id);

        /**Se obtienen los datos que el usuario envio*/
        $data = $request->validated();

        /**Se obtienen todas la habilidades de la vacante almacenada en la BD*/
        $habilidades = array();
        $tecnologias = $registro->skills;
        foreach ($tecnologias as $tecnologia) {
            $habilidades[] = $tecnologia->id;
        }

        //return $habilidades;
        //return $data['skills'];
        
        /**Comparar si dos arreglos son iguales*/

        /**Se eliminan los datos en la tabla pivote con el metodo detach y le pasamos un arreglo como parámetro*/
        $registro->skills()->detach($habilidades);

        /**Se inserta los datos de las nuevas habilidades en la tabla pivote con el metodo attach y le pasamos un arreglo como parámetro*/
        $registro->skills()->attach($data['skills']);

        /**Guarda la información actualizada de la vacante */
        $registro->update([
            'titulo' => $data['titulo'],
            'categoria_id' => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id' => $data['ubicacion'],
            'salario_id' => $data['salario'],
            'descripcion' => $data['descripcion'],
            'imagen' => $data['imagen']
        ]);

        /**Si no existe la imagen borra la imagen del 
         * storage y la rempleza por la nueva imagen
         * que envia el usuario
         * */
        if(!File::exists('storage/vacantes/'.$data['imagen'])){
            File::delete('storage/vacantes/'.$registro->imagen);
        }

        return redirect()->route('vacantes.index')->with('estado','Vacante '.$registro->titulo.' editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        $this->authorize('delete',$vacante);

        /**Obtener la vacante a eliminar */
        $vacante = Vacante::findOrFail($vacante->id);
        
        /**Eliminar vacante de la base de datos */
        $vacante->delete($vacante->id);
        //return $vacante->imagen;

        /**Eliminar la imagen de la vacante de la BD */
         if(File::exists('storage/vacantes/'.$vacante->imagen)){
            File::delete('storage/vacantes/'.$vacante->imagen);
        }

        /**Redireccionar y mostrar un mensaje en pantalla al usuario*/
        return back()->with('estado','La vacante '.$vacante->titulo.' eliminada correctamente');
    }

    public function subirImagen(Request $request){
        /**La imagen se obtiene del request */
        $imagen = $request->file('file');
        /**Se renombre la imagen para que el nombre sea unico*/
        $nombre = time().'.'.$imagen->extension();
        /**Se almacena la imagen en la ruta*/
        $imagen->move(public_path('storage/vacantes'),$nombre);
        /**Se envia una respuesta json del servidor al cliente*/
        return response()->json(['correcto' => $nombre]);
    }

    public function borrarImagen(Request $request){
        /**Se verificia que sea una peticion ajax por seguridad
         * del request se obtiene la imagen que esta enviando el 
         * usuario al servidor, se comprueba a traves del facade de laravel
         * FILE que exista la imagen para proceder a su borrado en el disco fisico
         * y una vez eliminado se envia una respuesta al servidor con el estado 200
         * que significa que la peticion se llevo correctamente
         */
        if($request->ajax()){
            $imagen = $request->imagen;
            if(File::exists('storage/vacantes/'.$imagen)){
                File::delete('storage/vacantes/'.$imagen);
            }
            return response('imagen eliminado',200); 
        }

    }

    public function estado($id){
        $vacante = Vacante::findOrFail($id);

        if($vacante->activa == 1){
            $vacante->update([
                'activa' => 0
            ]);
        }else{
            $vacante->update([
                'activa' => 1
            ]);
        }

        return back()->with('estado','La vacante '.$vacante->titulo.' cambio de estado');

    }

    /**Muestra un formulario para enviar los datos */
    public function buscar(Request $request){
        //return ddd($request->all());
        /**Validar */
        $data = $request->validate([
            'categoria' => 'required',
            'ubicacion' => 'required',
        ]);
        /**Asignar los valores*/
        $categoria = $data['categoria'];
        $ubicacion = $data['ubicacion'];

        /**Consulta con los parametros de busqueda*/
        $vacantes = Vacante::orderBy('created_at','asc')
                        ->where('categoria_id',$categoria)
                        ->where('ubicacion_id',$ubicacion)
                        ->get();
        
        return view('buscar.index',compact('vacantes'));


    }

    /**El servidor envia los resultados al usuario */
    public function resultados(){
        return 'resultados';
    }

}
