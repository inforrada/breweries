<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Bar;

class Top extends Component
{
    public $num = 6;
    public $type= "bars";
    public $bares;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $num = 3)
    {
        //
        $this->num = $num;
        $this->type = $type;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->type == 'bars') {
            $this->bares = Bar::orderByDesc('id')->limit($this->num)->get();
        }

        return view('components.top');
    }
}
