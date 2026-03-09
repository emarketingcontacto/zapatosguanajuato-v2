<?php

namespace App\View\Components\ComponentsWeb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SeoSchema extends Component
{
    //variables
    public $type;
    public $collection;
    public $routeName;

    public function __construct($type, $data, $routeName)
    {
        $this->type = $type;
        $this->collection = $data;
        $this->routeName = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components-web.seo-schema');
    }
}
