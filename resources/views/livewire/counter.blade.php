<div class="text-danger">
   @if ($countLivewire < 10) 
   <div><h2>Van {{ $countLivewire }} envíos con livewire</h2></div>
   @else 
   <div><h2 class="text-warning bg-danger">Van {{ $countLivewire }} envíos con livewire</h2></div>
   <img src="{{ asset('img/logo.png')}}">
   @endif 

    <div><button wire:click="incrementar">Enviar</button></div>
    afdadsfs
</div>
