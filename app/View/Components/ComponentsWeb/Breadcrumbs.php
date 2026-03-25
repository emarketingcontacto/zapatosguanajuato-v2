<?php

namespace App\View\Components\ComponentsWeb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    //Variables
    public $baseLabel;
    public $baseRoute;
    public $gender;
    public $genderSlug;
    public $type;
    public $business;

    public function __construct($gender = null, $type=null, $business=null, $genderSlug = null)
    {
        $this->gender = $gender;
        $this->genderSlug = $genderSlug;
        $this->type = $type;
        $this->business = $business;

        // Leemos el Request directamente en la clase
        if (Request::is('fabricantes*')) {
            $this->baseLabel = 'Fabricantes';
            $this->baseRoute = route('factories.index');
        } elseif (Request::is('mayoristas*')) {
            $this->baseLabel = 'Mayoristas';
            $this->baseRoute = route('wholesalers.index');
        } elseif (Request::is('minoristas*')) {
            $this->baseLabel = 'Minoristas';
            $this->baseRoute = route('retailers.index');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components-web.breadcrumbs');
    }
}
