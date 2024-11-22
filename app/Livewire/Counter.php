<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $countLivewire = 0;

    // método conectado con el frontal
    public function incrementar () {
        $this->countLivewire++;
    }

    // método de pintado de frontal
    public function render()
    {
        return view('livewire.counter');
    }
}
