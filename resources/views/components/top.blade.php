<div  class="row">
    @foreach ($bares as $key => $bar)
    <div class="col-2 py-2 d-flex align-items-stretch" >
        <div class="card w-100" >
            <a href="{{ route ('bars.show', $bar->id ) }}" >
                @if (isset($bar->image) && ($bar->image != ''))
                <img src="{{ $bar->image}}" class="card-img-top" alt="{{ $bar->name }}">
                @else
                <img src="{{ asset('img/logo.png')}}" class="card-img-top" alt="{{ $bar->name }}">
                @endif
            </a>
        <div class="card-body">

          <h5 class="card-title">{{ $bar->name }}</h5>


        </div>
      </div>

    </div>


    @endforeach
    </div>
