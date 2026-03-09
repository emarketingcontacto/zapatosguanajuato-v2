<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Category;
use App\Traits\HasFilters;

class WholesalerController extends Controller
{
    use HasFilters;
    //Category
    private $categorySlug = 'mayoristas';
    private $prefix = 'wholesalers';

    public function index() {
        $category = Category::where('slug', $this->categorySlug)->firstOrFail();
        $businesses = Business::where('category_id', $category->id)
            ->with(['shoeModels','category'])
            ->get();

        return view('web.wholesalers.index', compact('category', 'businesses'));
    }

    public function showGenero($genero) {
        $data = $this->getGenderData($this->categorySlug, $genero);
        return view('web.wholesalers.gender', array_merge($data, ['prefix' => 'wholesalers']));
    }

    public function showTipo($genero, $tipo) {
        $data = $this->getTypeData($this->categorySlug, $genero, $tipo);
        return view('web.wholesalers.type', array_merge($data, ['prefix' => 'wholesalers']));
    }

    public function show(Business $business) {
        // 1. Carga completa de relaciones (incluyendo material para el catálogo)
        $business->load(['category', 'shoeModels.subcategory', 'shoeModels.material', 'saleType']);
        // 2. Géneros disponibles en este negocio
        $genders = $business->shoeModels->pluck('gender')->unique()->filter();

        return view('web.wholesalers.show', compact('business', 'genders'))
            ->with('prefix', $this->prefix);
    }
}
