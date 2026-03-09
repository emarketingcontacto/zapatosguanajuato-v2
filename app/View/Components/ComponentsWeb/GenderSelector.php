<?php

namespace App\View\Components\ComponentsWeb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GenderSelector extends Component
{
    //variables
    public $prefix;
    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components-web.gender-selector');
    }
}
