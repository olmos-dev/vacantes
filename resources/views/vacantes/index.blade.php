@extends('layouts.app')

@section('navegacion')
    @include('partials.adminav')
@endsection

@section('content') 
    @if (session('estado'))
    <div class="bg-green-500 p-8 text-center text-white font-bold uppercase mensaje">
        <p class="text-right ocultar" role="button">&times;</p>
        {{session('estado')}}
    </div>
    @endif

    {{-- Titulo de la seccion --}}
    <h1 class="text-2xl text-center mt-10">Administrar Vacantes</h1>
    @if (count($vacantes) > 0)

    {{-- Tabla --}}
    <div class="flex flex-col mt-10">
        <div class="my-2 py-4 overflow-x-auto sm:-mx-6 sm:px-6 lg:mx-8 lg:px-8">
            <div class="aling-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase">Titulo Vacante</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase">Estado</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase">Canditados</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase" colspan="3" style="">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($vacantes as $vacante)
                        <tr>
                           <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                               <div class="flex items-center">
                                   <div class="ml-4">
                                       {{-- Titulo y categoria --}}
                                       <div class="text-sm leading-5 font-medium text-gray-900 text-capitalize">{{$vacante->titulo}}</div>
                                       <div class="text-sm leading-5 text-gray-500">Categoria: {{$vacante->categoria->nombre}} </div>
                                   </div>
                               </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                                {{-- Vacante actica --}}
                                <form action="{{route('vacantes.estado', ['id' => $vacante->id]) }}" method="POST"  >
                                    @csrf @method('PATCH')
                                    <button type="submit" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full outline-none text-capitalize {{$vacante->activa ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}}">
                                        {{$vacante->activa ? 'activa' : 'inactiva'}}
                                    </button>
                                </form>                                
                            </td> 
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                {{-- Candidatos --}}
                                <a href="{{route('candidato.index',['id' => $vacante->id])}}" class="text-gray-500 hover:text-gray-600">{{$vacante->candidatos->count()}} Candidatos</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm leading-5 font-medium">
                                {{-- Acciones --}}
                                <a href="{{route('vacantes.edit',['vacante' => $vacante->id]) }}" class="text-green-600 hover:text-green-900 mr-5">Editar</a>
                                <form action="{{route('vacantes.destroy',['vacante' => $vacante->id]) }}" method="POST" class="inline-block">
                                    @method('delete') @csrf
                                    <button class="text-red-600 hover:text-red-900 font-bold mr-5">Eliminar</button>
                                </form>
                                <a href="{{ route('vacantes.show',['vacante' => $vacante->id]) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    {{-- Paginador --}}
    <div class="flex flex-col">
        <div class="mb-2 py-4 overflow-x-auto sm:-mx-6 sm:px-6 lg:mx-8 lg:px-8">
            {{$vacantes->links()}}
        </div>
    </div>
    @else
    <p class="text-center text-gray-400 mt-3">No tienes vacantes aún</p>
    @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.ocultar').click(function (e) { 
                e.preventDefault();
                $('.mensaje').remove();
            });
        });
    </script>
@endsection