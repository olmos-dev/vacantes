<div class="bg-gray-100 px-4 pt-2 pb-5 mt-5 rounded">
    <h2 class="h2 mt-2">Busca una vacante</h2>
<form action="{{route('busqueda.buscar')}}" method="POST">
    @csrf
    <div class="mb-2">
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

    <div class="mb-3">
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

    <button type="submit" class="bg-green-500 w-full hover:bg-green-600 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
        Buscar Vacantes
    </button>
</form>
</div>