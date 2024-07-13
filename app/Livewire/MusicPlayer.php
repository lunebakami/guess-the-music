<?php

namespace App\Livewire;

use Livewire\Component;

class MusicPlayer extends Component
{
    public $music ="https://cdn-preview-d.dzcdn.net/stream/c-deda7fa9316d9e9e880d2c6207e92260-10.mp3";
    public $tentative = 0;
    public $musicName = "Music Name";
    public $guess = "";
    public $isCorrect = false;

    public function success() {
        $this->isCorrect = true;
        $this->dispatch('success');
    }

    public function check()
    {
        $this->tentative += 1;
        $this->dispatch('check', $this->tentative);
    }

    public function render()
    {
        return view('livewire.music-player');
    }
}
