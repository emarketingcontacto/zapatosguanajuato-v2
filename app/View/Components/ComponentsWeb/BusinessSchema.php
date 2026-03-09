<?php

namespace App\View\Components\ComponentsWeb;

use App\Models\Business;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BusinessSchema extends Component
{
    //variables
    public $business;
    public function __construct(Business $business)
    {
        $this->business = $business;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components-web.business-schema');
    }
}
