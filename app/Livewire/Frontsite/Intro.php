<?php

namespace App\Livewire\Frontsite;

use Livewire\Component;

class Intro extends Component
{
    public $slides = [
        'slide-4.png',
        'slide-5.png',
        'slide-7.png'
    ];

    public function render()
    {
        return view('livewire.frontsite.intro');
    }
}
