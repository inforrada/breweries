@extends ('layouts.layout')

@section ('title', 'Nuevo vino')

@section ('content')

<h1>Nuevo vino</h1>




 <x-msg-error :errors="$errors" />

        <x-flash-message code="{{ Session::get ('code') }}" message="{{ Session::get ('message') }}"/>

        <form method="POST" action="{{ route('wine.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nombre del vino</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old ('name')}}">
            </div>

              <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" id="description" class="form-control" >{{ old ('description')}}</textarea>
              </div>
             <div class="mb-3 d-flex row">
                <label for="description" class="form-label">Bares que lo sirven</label>
                @foreach ($bars as $bar)
                <div class="form-check col-md-4 ps-2">
                <div class="ps-4">
                  <input class="form-check-input" type="checkbox" value="{{ $bar->id }}" id="bar_{{ $bar->id }}" name="bars[]">
                  <label class="form-check-label" for="bar_{{ $bar->id }}">
                     {{ $bar->name }} 
                      </label>
                  </div>
                </div>
                @endforeach  
              
              </div>


            <div class="mb-3">
              <label for="winery" class="form-label">Bodega del vino</label>
              <input type="text" class="form-control" id="winery" name="winery" value="{{ old ('winery')}}">
            </div>
            <div class="mb-3">
              <label for="vol" class="form-label">Graduación del vino</label>
              <input type="number" step="0.1" class="form-control" id="vol" name="vol" value="{{ old ('vol')}}">
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Precio del vino</label>
              <input type="number" step="0.1" class="form-control" id="price" name="price" value="{{ old ('price')}}">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>


@endsection
