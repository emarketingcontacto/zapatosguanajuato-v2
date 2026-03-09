<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Category;
use App\Traits\HasFilters;

// use Illuminate\Http\Request;
class FactoryController extends Controller
{
    use HasFilters;
    private $categorySlug = 'fabricantes';
    private $prefix = 'factories';

    public function index(){
        $category = Category::where('slug', $this->categorySlug)->firstOrFail();
        $businesses = Business::where('category_id', $category->id)
            ->with(['shoeModels','category'])
            ->get();
        return view('web.factories.index', compact('category', 'businesses'));
    }

    public function showGenero($genero){
       $data = $this->getGenderData($this->categorySlug, $genero);
       return view('web.factories.gender', array_merge($data,[
            'prefix' => 'factories'
       ]));
    }

    public function showTipo($genero, $tipo) {
        // Llamamos a la lógica del Trait para tipos
        $data = $this->getTypeData($this->categorySlug, $genero, $tipo);
        return view('web.factories.type', array_merge($data, [
            'prefix' => 'factories'
        ]));
    }

    public function show(Business $business){
        // 1. Carga completa de relaciones (incluyendo material para el catálogo)
        $business->load(['category', 'shoeModels.subcategory', 'shoeModels.material', 'saleType']);
        // 2. Géneros disponibles en este negocio
        $genders = $business->shoeModels->pluck('gender')->unique()->filter();

        return view('web.factories.show', compact('business', 'genders'))
            ->with('prefix', $this->prefix);
    }
}
