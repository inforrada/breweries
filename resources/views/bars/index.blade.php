@extends('layouts.layout')

@section ('title', 'Listado de bares')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>


        @if (isset ($user) && (Auth::user() !== null) && ($user->id == Auth::user()->id))
        <h1>Mis propuestas</h1>
        @else
          <h1>Listado de bares</h1>
          @isset($user)
            <h2>Visualizando las propuestas de: {{ $user->name}}</h2>
          @endisset
        @endif


        <x-flash-message code="{{ Session::get ('code') }}" message="{{ Session::get ('message') }}"/>

        
  <livewire:search />
  <script>
document.addEventListener ('DOMContentLoaded', () => {
    console.log('hola');
    Livewire.hook ('morph.updated', ( {component}) => {
      console.log ('Component updated');
      //elimino marcadores del mapa
      map.eachLayer (function (layer) {
          if (layer && (typeof layer === 'object' && (layer instanceof L.Marker))) {
              layer.remove();
          }
      } );

      // crear los nuevos
      let names = document.getElementsByName ('name');
      let lats = document.getElementsByName ('lat');
      let longs = document.getElementsByName ('long');

      let i = 0;
      console.dir (names);
      while ( (i < names.length) && (i < lats.length) && (i < longs.length)) {
          L.marker([lats[i].value, longs[i].value]).addTo(map)
              //.bindPopup(names[i].value)
              //.openPopup();
          i++;    
      }
      
    });
});
var map = L.map('map').setView([40.4073813,-3.6993874], 5);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    let num = 0;
    let miIntervalo = setInterval ( ponerBar, 100);

    function ponerBar () {
        if (num < bares.length) {
          L.marker([bares[num][1], bares[num][2]]).addTo(map)
              .bindPopup(bares[num][0])
              .openPopup();
          num++; 
        }
        else {
          clearInterval (miIntervalo);
        }
   
    }


</script>

@endsection
