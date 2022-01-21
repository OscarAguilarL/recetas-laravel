<div class="col-md-4 mt-4">
  <div class="card shadow">
    <img
      src="/storage/{{ $receta->imagen }}"
      alt="{{ $receta->titulo }}"
      class="card-img-top"
    >

    <div class="card-body">
      <h3 class="card-title">{{ $receta->titulo }}</h3>

      <div class="meta-receta d-flex justify-content-between">

        <p class="text-primary fecha font-weight-bold">
          <fecha-receta fecha="{{ $receta->created_at }}"></fecha-receta>
        </p>

        @if (count($receta->likes) > 0)
          <p>a {{ count($receta->likes) }} les gustó.</p>
        @else
          <p>Ningún like</p>
        @endif
      </div>

      <p class="card-text">{{ Str::words(strip_tags($receta->preparacion), 20, '...') }}</p>
      <a
        href="{{ route('recetas.show', ['receta' => $receta->id]) }}"
        class="btn btn-primary d-block btn-receta"
      >
        Ver más
      </a>
    </div>
  </div>
</div>
