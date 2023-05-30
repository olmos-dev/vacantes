@extends('layouts.app')

@section('navegacion')
    @include('partials.adminav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Notificaciones</h1>
    @if (count($notificaciones) > 0)
        <ul class="max-w-md mx-auto mt-10"> 
            @foreach ($notificaciones as $notificacion)
                @php
                    $data = $notificacion->data
                @endphp
                <li class="p-5 border-gray-400 bg-white shadow mb-5">
                    <small class="text-gray-400 text-center w-full mb-5">Recibido: {{$notificacion->created_at->diffForHumans()}}</small>
                    <p class="mb-4 mt-4">Tienes un nuevo candidato en: <span class="font-bold">{{$data['vacante']}}</span></p>
                    <a href="{{ route('candidato.index',['id' => $data['vacante_id']]) }}" class="bg-green-500 p-2 text-white uppercase font-bold text-xs inline-block hover:bg-green-400">Ver Candidatos</a>
                   
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-center mt-5 text-gray-500">No hay notificaciones</p>
    @endif
@endsection
