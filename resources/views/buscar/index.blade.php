@extends('layouts.app')

@section('navegacion')
    @include('partials.navcategoria')
@endsection

@section('content')
    @if (count($vacantes) > 0) 
    <h1 class="m text-3xl text-gray-700 m-0 text-center">Resultados de búsqueda</h1>
    <div class="my-10 bg-gray-100 p-10 shadow">
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
    @else
    <p class="text-center text-gray-500">No hay resultados de búsqueda</p>
    @endif
@endsection
