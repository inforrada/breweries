<div class="col-4 py-2 d-flex align-items-stretch" >
          <div class="card w-100" >
            @if (isset($wine->image) && ($wine->image != ''))
            <img src="{{ $wine->image}}" class="card-img-top" alt="{{ $wine->name }}">
            @else
            <img src="{{ asset('img/logo.png')}}" class="card-img-top" alt="{{ $wine->name }}">
            @endif

            <div class="card-body">

              <h5 class="card-title">{{ $wine->name }}</h5>
              <p class="card-text">{{ $wine->description}}

            </p>
              <a href="{{ route ('wine.show', $wine->id ) }}" class="btn btn-primary">Ver</a>
            </div>
          </div>
        </div>