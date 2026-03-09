<?php

namespace App\View\Components\ComponentsWeb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategorySchema extends Component
{
    //variables
    public $collection;
    public $filterName;
    public $parentName;
    public $parentUrl;
    public $routeName;

    public function __construct($collection, $filterName, $parentName, $parentUrl, $routeName)
    {
        $this->collection = $collection;
        $this->filterName = $filterName;
        $this->parentName = $parentName;
        $this->parentUrl = $parentUrl;
        $this->routeName = $routeName;
    }

    public function render(): View|Closure|string
    {
        return view('components.components-web.category-schema');
    }
}
