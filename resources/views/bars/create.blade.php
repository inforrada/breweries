@extends ('layouts.layout')

@section ('title', 'Nuevo bar')

@section ('content')

<h1>Nuevo bar</h1>




 <x-msg-error :errors="$errors" />

        <x-flash-message code="{{ Session::get ('code') }}" message="{{ Session::get ('message') }}"/>

        <form method="POST" action="{{ route('bars.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nombre del bar</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old ('name')}}">

            </div>

              <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" id="description" class="form-control" >{{ old ('description')}}</textarea>
              </div>
              <div class="mb-3 d-flex row">
                <label for="wines" class="form-label">Vinos que sirve</label>
                @foreach ($wines as $wine)
                <div class="form-check col-md-4 ps-2">
                <div class="ps-4">
                  <input class="form-check-input" type="checkbox" value="{{ $wine->id }}" id="wine_{{ $wine->id }}" name="wines[]">
                  <label class="form-check-label" for="wine_{{ $wine->id }}">
                    {{ $wine->name}}
                  </label>
                  </div>
                </div>
                @endforeach
               
              </div>           
              <div class="mb-3">
                <label for="image" class="form-label">Foto</label>
                <input class="form-control" type="file" id="image" name="image">
              </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>


@endsection
