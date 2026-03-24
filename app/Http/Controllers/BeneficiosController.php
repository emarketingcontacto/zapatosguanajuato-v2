<?php

namespace App\Http\Controllers;

use App\Models\Click;
use Illuminate\Http\Request;

class BeneficiosController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $totalClicks = Click::count();
        return view('web.beneficios', compact('totalClicks'));

    }
}
