<?php

namespace App\View\Components\ComponentsWeb;

use App\Models\ShoeModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShoeCard extends Component
{
    //variables
    public $model;
    public function __construct(ShoeModel $model)
    {
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components-web.shoe-card');
    }
}
