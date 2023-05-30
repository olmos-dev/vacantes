@extends('layouts.app')

@section('navegacion')
    @include('partials.navcategoria')
@endsection

@section('content')
    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-2xl text-gray-700 m-0">Categoría: <span class="font-bold">{{$categoria->nombre}}</span></h1>

        <ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($vacantes as $vacante)
                <li class="p-10 border border-gray-300 bg-white shadow">
                    <h1 class="text-2xl font-bold text-green-500">{{$vacante->titulo}}</h1>
                    <p class="block text-gray-700 font-normal my-2">{{$vacante->categoria->nombre}}</p>
                    <p class="block text-gray-700 font-normal my-2">Ubicación: <span class="font-bold">{{$vacante->ubicacion->nombre}}</span></p>
                    <p class="block text-gray-700 font-normal my-2">Experiencia: <span class="font-bold">{{$vacante->experiencia->nombre}}</span></p>
                    <a href="{{ route('vacantes.show',['vacante' => $vacante->id]) }}" class="bg-green-500 text-white mt-2 px-3 py-1 inline-block rounded font-bold text-sm">Ver vacante</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

