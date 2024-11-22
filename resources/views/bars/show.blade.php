@extends ('layouts.layout')

@section('title', 'Ver Bar')

@section ('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

        <h1 class="text-center">Ver Bar</h1>


        <div  class="row  d-flex justify-content-center">

        <div class="col-8 py-2">
          <div class="card" >
            
           
            



    <div id="carouselImgs" class="carousel slide" >
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselImgs" data-bs-slide-to="0" class="active" aria-current="true" aria-label="{{ $bar->name }}"></button>
        @foreach ($bar->images as $key => $image)
        <button type="button" data-bs-target="#carouselImgs" data-bs-slide-to="{{ ($key + 1) }}" aria-label="{{ $bar->name }}"></button>
        @endforeach
      
      
      </div>
      <div class="carousel-inner">
      
        <div class="carousel-item active">
          <img src="{{ $bar->image}}" class="d-block w-100  ratio ratio-16x9" style="aspect-ratio: 2;" alt="{{ $bar->name }}">
        </div>
      
        @foreach ($bar->images as $image)
        <div class="carousel-item">
          <img src="{{ $image->image}}" class="d-block w-100  ratio ratio-16x9" style="aspect-ratio: 2;" alt="{{ $bar->name }}">
        </div>        
        @endforeach

      
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselImgs" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselImgs" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>




            <div class="card-body">
              <h5 class="card-title">{{ $bar->name }}</h5>
             @isset($bar->user)
              <h6 class="card-text" style="font-size: 0.7em">Propuesta de: 
              <a href="{{ route('bars.proposals', $bar->user) }}">{{ $bar->user->name}}</a></h6>
              @endisset
              <p class="card-text">
                @foreach($bar->wines as $wine) 
                  <span class="badge rounded-pill text-bg-primary">
                  <a href="{{ route ('wine.show', $wine)}}" class="nav-link">
                  {{ $wine->name }}</a></span>
                @endforeach
              </p>
              <p class="card-text">{{ $bar->description }}</p>
              <div id="map" class="bg-primary" style="width: 100%; height: 300px; max-height: 300px;"></div>

            </div>
          </div>
        </div>

        </div>
        <div class="d-flex justify-content-around">
            @auth
            @if (isset($bar->user) && (Auth::user()->id == $bar->user->id))
            <form method="POST" action="{{ route ('bars.delete', $bar->id) }}" onsubmit="return confirmar ('¿Estás seguro de borrar este bar?', 'Aviso');">
                @csrf
                <!-- Cross-Site Request Forgery -->
                <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
            <a href="{{ route ('bars.edit', $bar->id) }}" class="btn btn-warning">Editar</a>
            @endif
            @endauth
            <a href="{{ route ('bars.index') }}" class="btn btn-primary">Volver</a>
        </div>

<script>
var map = L.map('map').setView([{{ $bar->latitude}}, {{ $bar->longitude}}], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([{{ $bar->latitude}}, {{ $bar->longitude}}]).addTo(map)
    .bindPopup('{{ $bar->name }}')
    .openPopup();
</script>

@endsection
