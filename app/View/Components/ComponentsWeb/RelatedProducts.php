<?php

namespace App\View\Components\ComponentsWeb;

use App\Models\Business;
use App\Models\ShoeModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RelatedProducts extends Component
{
    //Variables
    public $business;
    public $prefix;
    public $relatedModels;

    public function __construct(Business $business, string $prefix)
    {
        $this->business=$business;
        $this->prefix = $prefix;
        $this->relatedModels =$this->getRelatedModels();
    }

    private function getRelatedModels(){
        $related = collect();
        if($this->business->shoeModels->isNotEmpty()){
            $mainSubcategoryId = $this->business->shoeModels->pluck('subcategory_id')->mode();

            if($mainSubcategoryId){
                $related = ShoeModel::where('business_id', '!=', $this->business->id)
                ->where('subcategory_id', $mainSubcategoryId)
                ->with(['business', 'material'])
                ->inRandomOrder()
                ->take(4)
                ->get();
            }
        }

        if($related->isEmpty()){
            $related = ShoeModel::where('business_id', '!=', $this->business->id)
                ->with(['business', 'material'])
                ->inRandomOrder()
                ->take(4)
                ->get();
        }
        return $related;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components-web.related-products');
    }
}
