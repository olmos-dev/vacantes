<div class="bg-gray-700">
    <nav class="container mx-auto flex flex-col text-center md:flex-row space-x-1">
        @foreach ($categorias as $categoria)
            <a class="text-white text-sm uppercase mx-auto font-bold p-3" href="{{route('categoria.index',['categoria' => $categoria->id])}}">{{$categoria->nombre}}</a>
        @endforeach
    </nav>
</div>
