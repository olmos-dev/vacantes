<aside class="md:w-2/5 bg-green-500 rounded m-3">
    <h2 class="text-2xl py-3 text-white uppercase font-bold text-center">Contacta al Reclutador</h2>
    <form action="{{route('candidato.store')}}" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="mb-4">
            <label for="nombre" class="block text-white text-sm font-bold mb-4 ml-5">Nombre </label>
            <input type="text" name="nombre" id="nombre" class="p-3 bg-gray-100 outline-none rounded form-input w-75 mx-5 @error('nombre') border border-red-500" @enderror placeholder="Nombre" value="{{ old('nombre') }}">
            @error('nombre')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-75 mx-5 mt-2" role="alert">
                    <small>{{$message}}</small>
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-white text-sm font-bold mb-4 ml-5">Correo electrónico </label>
            <input type="text" name="email" id="email" class="p-3 bg-gray-100 outline-none rounded form-input w-75 mx-5 @error('email') border border-red-500" @enderror placeholder="Correo electrónico" value="{{ old('email') }}">
            @error('email')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-75 mx-5 mt-2" role="alert">
                    <small>{{$message}}</small>
                </div>
            @enderror
        </div>
        <div class="my-4">
            <label for="cv" class="block text-white text-sm font-bold mb-4 ml-5">Curriculum</label>
            <input type="file" name="cv" id="cv" accept="application/pdf" class="p-3 bg-green-500 border mb-2 text-white rounded form-input w-75 mx-5  @error('cv') border-red-500" @enderror>
            @error('cv')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-75 mx-5" role="alert">
                    <small>{{$message}}</small>
                </div>
            @enderror
        </div>
      
        <div class="mb-4">
            <input type="submit" value="Enviar" class="bg-green-600 w-75 mx-5 hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase mt-3">
        </div>

        <input type="hidden" name="vacante" value="{{$vacante->id}}">
    </form>
</aside>