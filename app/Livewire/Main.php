<?php

namespace App\Livewire;

use Livewire\Component;

class Main extends Component
{
    public $name = 'John Doe';

    public function render()
    {
        return view('livewire.main');
    }
}
