<div class="py-4">
<div id="map" class="bg-primary my-4" style="width: 100%; height: 400px; max-height: 400px;" wire:ignore></div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <input type="text" class="form-control" placeholder="Busca aquí tu bar" wire:model.live="searchText" > 

    
<script>
  let bares = [];
</script>
        <div  class="row">
        @foreach ($bares as $key => $bar)
        <div class="col-4 py-2 d-flex align-items-stretch" >
          <div class="card w-100" >
            @if (isset($bar->image) && ($bar->image != ''))
            <img src="{{ $bar->image}}" class="card-img-top" alt="{{ $bar->name }}">
            @else
            <img src="{{ asset('img/logo.png')}}" class="card-img-top" alt="{{ $bar->name }}">
            @endif

            <div class="card-body">

              <h5 class="card-title">{{ $bar->name }}</h5>
              @isset($bar->user)
              <h6 class="card-text" style="font-size: 0.7em">Propuesta de: 
              <a href="{{ route('bars.proposals', $bar->user) }}">{{ $bar->user->name}}</a></h6>
              @endisset
              <p class="card-text">{{ $bar->description}}

            </p>
              <a href="{{ route ('bars.show', $bar->id ) }}" class="btn btn-primary">Ver</a>
            </div>
          </div>
        </div>

        @if (($key % 3) == 2)
    </div>
    <div  class="row">
        @endif
        <input type="hidden" name="name" value="{{ $bar->name}}">
        <input type="hidden" name="lat" value="{{ $bar->latitude}}">
        <input type="hidden" name="long" value="{{ $bar->longitude}}">
            
        <!--script>
            bares[bares.length] = ['{{ $bar->name }}', {{ $bar->latitude}}, {{ $bar->longitude}}];
        </script -->
        @endforeach
        </div>




        <div class="d-flex justify-content-center p-4">

        @auth
        <a href="{{ route ('bars.create')}}" class="btn btn-primary">Nuevo bar</a>
        @else
            <p>Solamente los usuarios registrados pueden crear nuevos bares<br>
            <a href="{{ route('register') }}">Date de alta ahora</a>
            </p>
        @endauth
        </div>

 
@if (method_exists ($bares, 'getPageName'))
<div class="d-flex justify-content-center">
   <ul class="pagination">
      <li class="page-item">
          <a class="page-link" href="{{ '?' . $bares->getPageName () . '=1' }}" rel="prev" aria-label="« Inicio">‹</a>
      </li>  


@for ($i = 1; $i <= $bares->lastPage () ; $i++)
   @if ($i == $bares->currentPage())
   <li class="page-item active" aria-current="page">
          <span class="page-link">{{ $i}}</span>
    </li>
   @else 
   <li class="page-item">
          <a class="page-link" href="{{  '?' . $bares->getPageName () . '=' . $i}}">{{ $i }}</a> 
   </li> 
   @endif
@endfor
<li class="page-item">
<a class="page-link" href="{{ '?' . $bares->getPageName () . '=' . $bares->lastPage () }}"rel="next" aria-label="Ultimo">›</a>
</li>
</ul>
</div>


@endif
</div>
