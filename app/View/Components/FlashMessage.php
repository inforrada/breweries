<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FlashMessage extends Component
{
    public $code;
    public $message;

    public $image;

    /**
     * Create a new component instance.
     */
    public function __construct($code, $message)
    {
        //
        $this->code = $code;
        $this->message = $message;

        if ($code > 0) {
            $this->image = asset('img/broken.png');
        }
        elseif ($code == 0) {
            $this->image = asset('img/logo.png');
        }

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.flash-message');
    }
}
