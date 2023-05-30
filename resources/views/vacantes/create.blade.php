@extends('layouts.app')

@section('navegacion')
    @include('partials.adminav')
@endsection

@section('estilos')
    {{-- MediumEditor --}}
    <link rel="stylesheet" href="{{asset('css/medium-editor.min.css')}}">
    {{-- Dropzone --}}
    <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
    {{-- Select2 --}}
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>
    <form method="POST" action="{{route('vacantes.store')}}" class="max-w-lg mx-auto my-10">
        @csrf
        {{-- Titulo --}}
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2 capitalize">titulo vacante</label>
            <input id="titulo" type="text" class="p-3 bg-white rounded form-input outline-none w-full @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" autofocus>
            @error('titulo')
                <div class="bg-red-100 border border-red-500 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <span>{{$message}}</span>
                </div>
            @enderror
        </div>
        {{-- Categoria --}}
        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2 capitalize">categoria</label>
            <select name="categoria" id="categoria" class="block appearance-none border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-white w-full">
                <option disabled selected>-Seleccionar-</option>
                @foreach ($categorias as $categoria)
                    <option {{old('categoria') == $categoria->id ? 'selected' : ''}} value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
            @error('categoria')
            <div class="bg-red-100 border border-red-500 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <span>{{$message}}</span>
            </div>
        @enderror
        </div>
        {{-- Experiencia--}}
        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2 capitalize">Experiencia</label>
            <select name="experiencia" id="experiencia" class="block appearance-none border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-white w-full">
                <option disabled selected>-Seleccionar-</option>
                @foreach ($experiencias as $experiencia)
                    <option {{old('experiencia') == $experiencia->id ? 'selected' : ''}} value="{{$experiencia->id}}">{{$experiencia->nombre}}</option>
                @endforeach
            </select>
            @error('experiencia')
            <div class="bg-red-100 border border-red-500 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <span>{{$message}}</span>
            </div>
            @enderror
        </div>
        {{-- Ubicación --}}
        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2 capitalize">ubicación</label>
            <select name="ubicacion" id="ubicacion" class="block appearance-none border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-white w-full">
                <option disabled selected>-Seleccionar-</option>
                @foreach ($ubicaciones as $ubicacion)
                    <option {{old('ubicacion') == $ubicacion->id ? 'selected' : ''}} value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
                @endforeach
            </select>
            @error('ubicacion')
            <div class="bg-red-100 border border-red-500 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <span>{{$message}}</span>
            </div>
            @enderror
        </div>
        {{-- Salarios --}}
        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2 capitalize">Salario</label>
            <select name="salario" id="salario" class="block appearance-none border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-white w-full">
                <option disabled selected>-Seleccionar-</option>
                @foreach ($salarios as $salario)
                    <option {{old('salario') == $salario->id ? 'selected' : ''}} value="{{$salario->id}}">{{$salario->nombre}}</option>
                @endforeach
            </select>
            @error('salario')
            <div class="bg-red-100 border border-red-500 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <span>{{$message}}</span>
            </div>
            @enderror
        </div>
        {{-- Descripcion --}}
        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripción del puesto</label>
            <div class="editor p-3 bg-white rounded form-input w-full text-gray-700 outline-none"></div>
            <input type="hidden" name="descripcion" id="descripcion" value="{{old('descripcion')}}">
            @error('descripcion')
            <div class="bg-red-100 border border-red-500 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <span>{{$message}}</span>
            </div>
            @enderror
        </div>
        {{-- Imagen --}}
        <div class="mb-5">
            <label for="dropzone" class="block text-gray-700 text-sm mb-2">Imágen Vacante</label>
            <div id="dropzone" class="dropzone rounded bg-white"></div>
            <small id="error" class="mt-1 text-red-600"></small>
            <input type="hidden" id="imagen" name="imagen" value="{{ old('imagen') }}">
            @error('imagen')
            <div class="bg-red-100 border border-red-500 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <span>{{$message}}</span>
            </div>
            @enderror
        </div>
        {{-- comment 
        <div class="mb-5">
            <label for="habilidades" class="block text-gray-700 text-sm mb-2">Habilidades y Conocimientos</label>
            @php
                $habilidades = ['HTML','JS','CSS'];
            @endphp
            <lista-habilidades :habilidades={{ json_encode($habilidades) }}></lista-habilidades>
        </div>
        --}}
        <div class="mb-5">
            <label for="habilidades" class="block text-gray-700 text-sm mb-2">Habilidades y Conocimientos</label>
            <select name="skills[]" class="select block appearance-none border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-white w-full" multiple="multiple" data-placeholder="Seleccione al menos 3 opciones" style="width: 100%;">
                @foreach ($skills as $skill)
                    <option {{collect(old('skills'))->contains($skill->id) ? 'selected' : '' }} value="{{$skill->id}}">{{$skill->nombre}}</option>                
                @endforeach   
            </select>
            @error('skills')
            <div class="bg-red-100 border border-red-500 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <span>{{$message}}</span>
            </div>
            @enderror
        </div>
        
        
        <button type="submit" class="bg-green-500 w-full hover:bg-green-600 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
            Publicar vacante
        </button>
        

    </form>
@endsection

@section('scripts')
    {{-- MediumEditor --}}
    <script src="{{asset('js/medium-editor.min.js')}}"></script>
    {{-- Dropzone --}}
    <script src="{{asset('js/dropzone.min.js')}}"></script>
    {{-- jQuery --}}
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.select').select2();
        });
    </script>

    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () => {
            //MediumEditor
            const editar = new MediumEditor('.editor', {
                toolbar:{
                    buttons:['bold','italic','underline','justifyLeft','justifyCenter','justifyRight','justifyFull','orderedlist','unorderedlist','h2','h3'],
                    static:true,
                    sticky:true,
                },
                placeholder:{
                    text:'Información de la vacante'
                }
            });

            //una funcion para agregar el texto en tiempo real
            editar.subscribe('editableInput',function(event,editable){
                //agregar el contenido a una variable
                const contenido = editar.getContent();
                //se le pasa al input el valor del plugin del editor para posterior sea guardado en la BD por el servidor
                document.getElementById('descripcion').value = contenido;
            })
            //Llena el editor lo que contiene el input hidden al editor
            editar.setContent(document.getElementById('descripcion').value);

            //Dropzone
            const dropzone = new Dropzone('#dropzone',{
                //URL donde se va almacenar la imagen
                url:"/vacantes/subir-imagen",
                //cambiar el texto del placeholder
                dictDefaultMessage: 'sube aquí la imágen',
                //validar el formato de las imagenes aceptadas
                acceptedFiles: ".png,.jpg,.jpeg,.gif.bmp",
                //agregar un boton 'quitar' para que se quite la imagen en la vista previa
                addRemoveLinks:true,
                //cambiar el texto
                dictRemoveFile:'Quitar',
                //maximo de archivos permitidos
                maxFiles: 1,
                //importante el envio del CSRF token
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function(){
                    if(document.getElementById('imagen').value.trim()){
                        let imagenPublicada = {};
                        imagenPublicada.size = 800;
                        imagenPublicada.name = document.getElementById('imagen').value;

                        this.options.addedfile.call(this,imagenPublicada);
                        this.options.thumbnail.call(this,imagenPublicada,`/storage/vacantes/${imagenPublidada.name}`);

                        imagenPublicada.previewElement.classList.add('dz-sucess');
                        imagenPublicada.previewElement.classList.add('dz-complete');

                    }
                },
               
                //file: informacion detallada del archivo que es enviado al servidor
                //response: es la respuesta que envia el servidor al cliente
                //estado de dropzone cuando la imagen se subio correctamente
                success: function(file,response){
                    //console.log(response);
                    //console.log(file);
                    document.getElementById('error').textContent = "";
                    //document.getElementById('imagen').value = response.correcto;

                    //el nuevo nombre de la imagen del servidor se le añade al input en forma de objeto a traves del response
                    document.getElementById('imagen').value = response.correcto;
                    file.nombreImagen = response.correcto;
                    //console.log(response.correcto);
                },
                //estado de dropzone para el numero maximo de imagenes
                maxfilesexceeded: function(file){
                    //Elimina la imagen anterior y agrega una nueva (como solo se permite una imagen)
                    if(this.files[1] != null){
                        this.removeFile(this.files[0]);
                        this.addFile(file);
                    }
                },
                //estado de dropzone donde esta al pendiente que imagen fue removida o quitada
                removedfile: function(file,response){
                    //console.log(file);

                    //Elimina las imagenes del DOM para no ser mostradas más al usuario
                    file.previewElement.parentNode.removeChild(file.previewElement);
                    //Se crea un objecto con el nuevo nombre de la imagen (tratada desde el servidor)
                    params = {
                        imagen: file.nombreImagen ?? document.getElementById('imagen').value

                    }

                    //peticion axion para eliminar la imagen al servidor
                    axios.post('/vacantes/borrar-imagen',params)
                        .then(respuesta => console.log(respuesta))
                }
            });


        });
    </script>
    
@endsection