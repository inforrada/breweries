@extends('layouts.layout')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

<h1>Bienvenido al portal de los mejores bares</h1>

<x-top type="bars" num="6"/>
@isset ($quote)
<h2>La frase de hoy de Chuck Norris es:</h2>
<dd>{{ $quote }}</dd>
@endisset
<h2>Estamos aquí...</h2>
<div id="map" class="bg-primary" style="width: 100%; height: 400px; max-height: 400px; margin-bottom: 100px"></div>
<script>
var map = L.map('map').setView([40.4073813,-3.6993874], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([40.4073813,-3.6993874]).addTo(map)
    .bindPopup('Estamos aquí en España')
    .openPopup();
</script>
@endsection
