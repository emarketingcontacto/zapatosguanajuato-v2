<?php

namespace App\View\Components\ComponentsWeb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TypeSelector extends Component
{
    //variables
    public $types;
    public $currentGenderSlug;
    public $prefix;
    public $genderName;

    public function __construct($types, $currentGenderSlug, $prefix, $genderName)
    {
        $this->types = $types;
        $this->currentGenderSlug = $currentGenderSlug;
        $this->prefix = $prefix;
        $this->genderName = $genderName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components-web.type-selector');
    }
}
