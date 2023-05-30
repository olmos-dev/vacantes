@extends('layouts.app')

@auth
    @section('navegacion')
        @include('partials.adminav')
    @endsection
@endauth

@section('estilos')
    {{-- lightbox --}}
    <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
@endsection

@section('content')
    {{--  
    @foreach ($vacantes as $vacante)
    --}}
    @if (session('estado'))
    <div class="bg-green-500 p-8 text-center text-white font-bold uppercase">
        {{session('estado')}}
    </div>
    @endif
    <h1 class="text-3xl text-center mt-10">{{$vacante->titulo}}</h1>

    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-3/5">
            <p class="block text-gray-700 font-bold my-2">
                Publicado: <span class="font-normal">{{$vacante->created_at->diffForHumans()}} <span class="font-bold">por: </span>{{$vacante->reclutador->name}}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Categoría: <span class="font-normal">{{$vacante->categoria->nombre}}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Salario: <span class="font-normal">{{$vacante->salario->nombre}}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Ubicación: <span class="font-normal">{{$vacante->ubicacion->nombre}}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Experiencia: <span class="font-normal">{{$vacante->experiencia->nombre}}</span>
            </p>

            <h2 class="text-2xl text-center mt-10 text-gray-700">Conocimientos y Tecnologías</h2>

            @foreach ($vacante->skills as $skill)
                <p class="inline-block rounded py-2 px-8 text-gray-700 mt-5" style="border: 1px solid #37415180">{{$skill->nombre}}</p>
            @endforeach

            <a href="{{asset('storage/vacantes/'.$vacante->imagen)}}" data-lightbox="imagen" data-title="Vacante {{$vacante->titulo}}">
                <img src="{{asset('storage/vacantes/'.$vacante->imagen)}}" alt="" class="w-40 mt-10">
            </a>
          

            <div class="descripcion mt-10 mb-5">
                {!! $vacante->descripcion !!}
            </div>

        </div>
        @include('vacantes.contacto')
    </div>
    {{-- 
        @endforeach
    --}}
@endsection

@section('scripts')
    <script src="{{asset('js/lightbox.min.js')}}"></script>
@endsection

{{-- Consulta muchos a muchos con loading Eager --}}
{{-- 
    @foreach ($data as $item)
        @foreach ($item->skills as $value)
            {{$value->nombre}}
         @endforeach
    @endforeach     
--}}


{{-- Consulta muchos a muchos con solo las relaciones --}}
{{-- 
    @foreach ($vacante->skills as $skill )
    {{$skill->nombre}}
    @endforeach
--}}


