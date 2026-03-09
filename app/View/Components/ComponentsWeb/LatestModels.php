<?php

namespace App\View\Components\ComponentsWeb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ShoeModel;

class LatestModels extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
         $newModels = ShoeModel::with('business')
            ->latest()
            ->take(4)
            ->get();

        return view('components.components-web.latest-models',['newModels'=>$newModels]);
    }
}
