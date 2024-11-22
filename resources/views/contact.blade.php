@extends ('layouts.layout')

@section ('title', 'Contacto')

@section ('content')

<h1>Contacto</h1>





        <x-flash-message code="{{ Session::get ('code') }}" message="{{ Session::get ('message') }}"/>


        <form method="POST" action="">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nombre </label>
              <input type="name" class="form-control" id="name" name="name" aria-describedby="nameHelp">
              <div id="nameHelp" class="form-text">Cómo quieres que te llamemos.</div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Nunca compartiremos tu email con nadie.</div>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Tu consulta </label>
                <textarea name="description" id="description" class="form-control"  aria-describedby="descriptionHelp"></textarea>
                <div id="descriptionHelp" class="form-text">Qué nos quieres contar.</div>
              </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="check" name="check">
              <label class="form-check-label" for="exampleCheck1">Estoy de acuerdo con la política de privacidad</label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
@endsection
