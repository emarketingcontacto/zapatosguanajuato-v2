<?php

namespace App\View\Components\ComponentsWeb;

use App\Models\Business;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BusinessCard extends Component
{
    //variables
    public $business;
    public $prefix;

    public function __construct(Business $business, string $prefix)
    {
        $this->business = $business;
        $this->prefix = $prefix;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components-web.business-card');
    }
}
