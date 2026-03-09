<?php

namespace App\Livewire\Web;

use Livewire\Component;
use App\Models\ShoeModel;
use Livewire\Attributes\On;

class ShoeModelModal extends Component
{
    //variables
    public $isOpen = false;
    public $model = null;

    #[On('openModal')]
    public function loadModel($id)
    {
        // Cargamos con relaciones para evitar N+1
        $this->model = ShoeModel::with(['business.saleType', 'material', 'subcategory'])->find($id);
        if($this->model){
            $this->isOpen = true;
        }

    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->model = null;
    }

    public function render()
    {
        return view('livewire.web.shoe-model-modal');
    }
}
