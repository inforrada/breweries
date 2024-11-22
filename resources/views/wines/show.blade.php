@extends ('layouts.layout')

@section ('content')


<h1 class="text-center">Detalle de vino</h1>





        <x-flash-message code="{{ Session::get ('code') }}" message="{{ Session::get ('message') }}"/>

    <div  class="row  d-flex justify-content-center">
        <div class="col-8 py-2 d-flex align-items-stretch" >
          <div class="card w-100" >
            @if (isset($wine->image) && ($wine->image != ''))
            <img src="{{ $wine->image}}" class="card-img-top" alt="{{ $wine->name }}">
            @else
            <img src="{{ asset('img/logo.png')}}" class="card-img-top" alt="{{ $wine->name }}">
            @endif

            <div class="card-body">

              <h5 class="card-title">{{ $wine->name }}</h5>
              <p class="card-text">
                @foreach ($wine->bars as $bar)
                 <span class="badge rounded-pill text-bg-primary">
                  <a href="{{ route ('bars.show', $bar)}}" class="nav-link">
                    {{ $bar->name }}</a></span>
                @endforeach
              </p>

              <p class="card-text">{{ $wine->description}}</p>
              <p class="card-text">Bodega: {{ $wine->winery}}<br>
              
              Graduación: {{ $wine->vol}} %<br>
              Precio: {{ $wine->price}} €  
              @isset ($rates)
              <a href="javascript:verConversiones() " class="btn btn-primary mx-2" alt="Ver conversiones"><i class="bi bi-cash-coin"></i></a>
               <div id="divConversiones" class="p-4 bg-secondary" style="display: none">
                  <h6>Conversión a otras monedas</h6>
                  @foreach ($rates as $key => $rate)
                    <br>{{ $key . ' ' . $rate }} 
                      
                  @endforeach
                </div>  
              @endisset  
              </p>
              
            </div>
          </div>
        </div>

    </div>    


        <div class="d-flex justify-content-around">
            @auth
            <form method="POST" action="{{ route ('wine.destroy', $wine->id) }}" onsubmit="return confirmar ('¿Estás seguro de borrar este vino?', 'Aviso');">
                @method('DELETE')
                @csrf
                <!-- Cross-Site Request Forgery -->
                <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
            <a href="{{ route ('wine.edit', $wine->id) }}" class="btn btn-warning">Editar</a>
            @endauth
        <a href="{{ route ('wine.index') }}" class="btn btn-primary">Volver</a>

        </div>
<script>

function verConversiones () {
  let obj = document.getElementById ('divConversiones');
  if (obj) {
    if (obj.style.display == 'none') {
      obj.style.display = 'block';
    }
    else {
      obj.style.display = 'none';
    }

  }
}
</script>

@endsection