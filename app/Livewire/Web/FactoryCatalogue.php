<?php

namespace App\Livewire\Web;

use Livewire\Component;
// use App\Models\ShoeModel;
use App\Models\Material;
use App\Models\Business;

class FactoryCatalogue extends Component
{
    //variables
    public Business $business;
    public $filterGender = 'todos';
    public $selectedMaterial = '';

    public function mount(Business $business){
        $this->business = $business;
    }

    public function render()
    {
        // 1. Relacion para empezar el query
           $query = $this->business->shoeModels();

        //2. Filtro de Genero
        if($this->filterGender !== 'todos'){
            $query -> where('gender', $this->filterGender);
        }

        //3. Filtro de Material
        if($this->selectedMaterial){
            $query->where('material_id', $this->selectedMaterial);
        }

        return view('livewire.web.factory-catalogue',[
            'models'=>$query->with(['material', 'subcategory'])->get(),
            'materials' => Material::all()
        ]);
    }
}
