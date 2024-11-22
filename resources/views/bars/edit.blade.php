@extends ('layouts.layout')

@section ('title', 'Nuevo bar')

@section ('content')

<h1>Actualización de bar</h1>




        <x-msg-error :errors="$errors" />
        <x-flash-message code="{{ Session::get ('code') }}" message="{{ Session::get ('message') }}"/>

        <form method="POST" action="{{ route('bars.update', $bar->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nombre del bar</label>
              <input type="name" class="form-control" id="name" name="name" value="{{ $bar->name}}">

            </div>

              <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" id="description" class="form-control" >{{ $bar->description}}</textarea>
              </div>
              <div class="mb-3 d-flex row">
                <label for="wines" class="form-label">Vinos que sirve</label>
                @foreach ($wines as $wine)
                <div class="form-check col-md-4 ps-2">
                <div class="ps-4">
                  <input class="form-check-input" type="checkbox" value="{{ $wine->id }}" id="wine_{{ $wine->id }}" name="wines[]" 
                  {{ (($bar->wines->find($wine->id)) ? 'checked': '')}}
                  >
                  <label class="form-check-label" for="wine_{{ $wine->id }}">
                    {{ $wine->name}}
                  </label>
                  </div>
                </div>
                @endforeach
               
              </div>  
              <div class="mb-3">
                <label for="image" class="form-label">Fotos</label>
                  <div  id="dropzone" class="mb-3 border border-primary border border-5 rounded p-4 textOpacity" >
                    <p class="text-center"><i class="bi bi-cloud-arrow-up-fill fs-3 "></i><br>
                    <input class="form-control d-none" type="file" id="image" name="image[]" multiple>
                    <div id="txtImgNames" class="text-center">Arrastra hasta aquí las imágenes</div>
                    </p>
                  </div>
                
                
              </div>
              <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="S" id="borrarimg" name="borrarimg">
                  <label class="form-check-label" for="borrarimg">Borrar imágenes previamente asociadas</label>
              </div>
              
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>

<script>
    const dropzone = document.getElementById ('dropzone');
    const fileupload = document.getElementById ('image');

    dropzone.addEventListener ("dragover", (e) => {
      e.preventDefault ();
      dropzone.classList.remove ('textOpacity');
    });

    dropzone.addEventListener ("dragleave", (e) => {
     // e.preventDefault ();
      dropzone.classList.add ('textOpacity');
    });

    dropzone.addEventListener ("drop", (e) => {
        e.preventDefault ();
        fileupload.files = e.dataTransfer.files;
        setFileNames ();
         dropzone.classList.add ('textOpacity');
    });

    function setFileNames () {
        let x = '';
        for (let i = 0; i < fileupload.files.length; i++) {
            x += '<br>' + fileupload.files[i].name;
        }
        document.getElementById ('txtImgNames').innerHTML = x;
    }
</script>
@endsection
