<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bar;

use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
class Search extends Component
{
    public $bares = null;
    public $searchText = "";
    public function render()
    {
        if ($this->searchText =='') {
            $this->bares = Bar::orderBy('name')->get();
        }
        else {

            $this->bares = Bar::where ('name', 'like', "%{$this->searchText}%")->orderBy('name')->get();
            //dd($this->bares);
        }
    /*    $user = Auth::user();
        if (!is_null($user)) {
            if ($this->searchText =='') {
                $this->bares = Bar::orderBy('name')->get();
            }
            else {

                $this->bares = Bar::where ('name', 'like', "%{$this->searchText}%")->orderBy('name')->get();
                dd($this->bares);
            }
        
        }
        else {
            $this->bares = Bar::orderByDesc('id')->limit(6)->get();
        }
        */
        foreach($this->bares as $bar) {
            if (!isset($bar->image) || ($bar->image == '')) {
                $bar->image = asset ('img/logo.png');
            }
        }
        return view('livewire.search');
    }
}
