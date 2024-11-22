@extends ('layouts.layout')

@section ('content')


<h1>Listado de vinos</h1>





        <x-flash-message code="{{ Session::get ('code') }}" message="{{ Session::get ('message') }}"/>

        <div id="divScroll" class="row ">
        @foreach ($wines as $key => $wine)
        
        <x-wine :wine="$wine" />

        @if (($key % 3) == 2)
    </div>
    <div  class="row">
        @endif
        @endforeach
        </div>

        <div class="d-flex justify-content-center p-4">

        @auth
        <a href="{{ route ('wine.create')}}" class="btn btn-primary">Nuevo vino</a>
        @else
            <p>Solamente los usuarios registrados pueden crear nuevos vinos<br>
            <a href="{{ route('register') }}">Date de alta ahora</a>
            </p>
        @endauth
        </div>

<a href="javascript:window.moreData()">Siguiente pagina</a>

<script>
window.page = 1;
window.finScroll = false;
window.ajaxPdte = false;
window.moreData = ( () => {
      if ((window.finScroll == false) && (window.ajaxPdte == false)){
          window.ajaxPdte = true;
          window.page++;
          urlScroll = '{{ route('wine.index')}}?page=' + window.page;

          $.ajax (
            {
              url: urlScroll,
              type: 'get'
            }
          ).done (function (data) {

                if (data.scrollHTML == '') {
                  window.finScroll = true;
                }
                else {
                    $('#divScroll').append (data.scrollHTML);
                }
              
                window.ajaxPdte = false;
          })
          .fail (function (jqXHR, ajaxOption, thrownError) {
              $('#divScroll').append ('<p class="text-danger">Ha ocurrido un error al cargar más vinos</p>');
              window.ajaxPdte = false;
          });
      }
      
});

window.addEventListener ('scroll', function () {
    console.log ('pasa por listener');
    if ( ($(window).scrollTop + $(window).height ) >= 
          ($('#divScroll').scrollTop +  $('#divScroll').height))  {
            console.log ('dentro del if');
            window.moreData()
    }
    console.log ('' + $(window).scrollTop + '-' + $(window).height + '-' + $('#divScroll').scrollTop + '-' + $('#divScroll').height)
});
</script>
@endsection