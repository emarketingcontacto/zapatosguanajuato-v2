<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Click;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class TrackingController extends Controller
{
    public function store(Business $business, Request $request)
    {
        $agent = new Agent();
        $agent->setUserAgent($request->header('User-Agent'));

        // Determinamos la plataforma de forma legible
        $platform = 'Desktop';
        if ($agent->isMobile()) {
            $platform = 'Mobile';
        } elseif ($agent->isTablet()) {
            $platform = 'Tablet';
        }

        // Guardamos el click con datos limpios
        Click::create([
            'business_id' => $business->id,
            'click_type'  => 'whatsapp',
            'ip_address'  => $request->ip(),
            'platform'    => $platform, // Guardará "Mobile", "Tablet" o "Desktop"
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Click tracked on ' . $platform
        ]);
    }
}
