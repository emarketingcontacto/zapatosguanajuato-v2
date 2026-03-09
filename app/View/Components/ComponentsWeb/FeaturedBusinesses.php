<?php

namespace App\View\Components\ComponentsWeb;

use App\Models\Business;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedBusinesses extends Component
{
    //Variables
    public $businesses;
    public $categoryName;
    public $url;

    public function __construct(string $category)
    {
       $this->url= match($category){
            'Fabricante' => 'fabricantes-calzado-guanajuato',
            'Mayorista' => 'mayoristas-calzado-guanajuato',
            'Minorista' => 'minoristas-calzado-guanajuato',
            default => '/'
        };

        $this->categoryName = $category;
        //Query by category and Premium today
        $this->businesses = Business::whereHas('category', function($q){
            $q->where('name', $this->categoryName);
        })
        ->activePremium()
        ->take(4)
        ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components-web.featured-businesses');
    }
}
