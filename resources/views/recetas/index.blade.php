@extends('layouts.app')


@section('botones')

{{-- {{ Auth::user() }} --}}

@include('ui.navegacion')

@endsection

@section('content')

<h2 class="text-center mb-5">Administra tus recetas</h2>

<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Categoría</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($recetas as $receta)
            <tr>
                <td>{{$receta->titulo}}</td>
                <td>{{$receta->categoria->nombre}}</td>
                <td>
                    <eliminar-receta receta-id="{{$receta->id}}"></eliminar-receta>
                    <a
                      href="{{route('recetas.edit', ['receta' => $receta->id])}}"
                      class="btn btn-dark d-block mb-2">Editar</a>
                    <a
                      href="{{route('recetas.show', ['receta' => $receta->id])}}"
                      class="btn btn-success d-block mb-2">Ver</a>
                    {{-- <a href="{{action('RecetaController@show', ['receta' => $receta->id])}}" class="btn btn-success mr-1">Ver</a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="col-12 mt-4 justify-content-center d-flex">
        {{ $recetas->links() }}
    </div>

    <h2 class="text-center my-5">Recetas que te gustaron</h2>

    <div class="col-md-10 mx-auto bg-white p-3">

        @if(count($usuario->meGusta) > 0)
        <ul class="list-group">
            @foreach($usuario->meGusta as $recetaGustada)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p>{{ $recetaGustada->titulo }}</p>

                    <a class="btn btn-outline-success text-uppercase" href="{{ route('recetas.show', ['receta' => $recetaGustada->id]) }}">
                        Ver
                    </a>
                </li>
            @endforeach
        </ul>

        @else
        <p class="text-center">Aún no te han gustado recetas</p>
        @endif

    </div>

</div>


@endsection
