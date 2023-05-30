@extends('layouts.app')

@section('navegacion')
    @include('partials.adminav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Candidatos: {{$vacante->titulo}}</h1>
    @if (count($vacante->candidatos) > 0)
        <ul class="max-w-md mx-auto mt-10">
            @foreach ($vacante->candidatos as $candidato)
                <li class="p-5 bg-white shadow mb-5">
                    <small class="mb-4 text-gray-400">Recibido: {{$candidato->created_at->diffForHumans()}}</small>
                    <p class="mb-4 mt-4">Nombre: <span class="font-bold"> {{$candidato->nombre}}</span></p>
                    <p class="mb-4">Correo electrónico: <span class="font-bold"> {{$candidato->email}}</span></p>
                    <a href="{{asset('storage/cv/'.$candidato->cv)}}" target="_blank" class="bg-green-500 p-2 text-white uppercase font-bold text-xs inline-block hover:bg-green-400">Ver CV</a>
                    
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500">No hay candidatos aún</p>
    @endif
@endsection