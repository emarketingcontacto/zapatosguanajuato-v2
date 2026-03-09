<?php

namespace App\View\Components\ComponentsWeb;

use App\Models\Business;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BusinessDetail extends Component
{
    //Variables
    public $business;
    public $genders;

    public function __construct(Business $business , $genders)
    {
        $this->business = $business;
        $this->genders = $genders;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components-web.business-detail');
    }
}
