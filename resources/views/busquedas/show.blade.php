@extends('layouts.app')

@section('content')
  <div class="container">
    <h2 class="titulo-categoria text-uppercase mb-4">
      Resultados para: {{ $busqueda }}
    </h2>

    <div class="row">
      @foreach ($recetas as $receta)
        @include('ui.receta')
      @endforeach
    </div>

  </div>
@endsection
