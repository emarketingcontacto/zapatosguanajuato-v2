<?php

namespace App\Livewire;

// use App\Models\ShoeModel;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Home extends Component
{
   #[Layout('components.components-web.layouts-web.app')]
    public function render()
    {
        return view('livewire.home');
    }
}
