@extends ('layouts.layout')

@section ('content')
 <h1>Hello, world!</h1>
<input type="text" name="x" value="Inicial">
<form method="post">

    @csrf
    <h2>Van {{ $count }} envíos</h2>
    <button type="submit">Enviar</button>
</form>
  <hr>
  <livewire:counter />     
 @endsection
