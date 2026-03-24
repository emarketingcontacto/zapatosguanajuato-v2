<?php

use App\Http\Controllers\Advertise;
// use App\Http\Controllers\BeneficiosController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\WholesalerController;
use App\Http\Controllers\TrackingController;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;

//Home
Route::get('/', Home::class);

/**
 * SECCIÓN: FABRICANTES
*/
Route::get('/fabricantes-calzado-guanajuato/genero/hombre/{any?}', function ($any = null) {
    $url = '/fabricantes-calzado-guanajuato/genero/hombres' . ($any ? '/' . $any : '');
    return Redirect::to($url, 301);
})->where('any', '.*');

Route::prefix('fabricantes-calzado-guanajuato')->group(function () {
    Route::get('/', [FactoryController::class, 'index'])->name('factories.index');
    Route::get('/genero/{genero}', [FactoryController::class, 'showGenero'])->name('factories.gender');
    Route::get('/genero/{genero}/tipo/{tipo}', [FactoryController::class, 'showTipo'])->name('factories.type');
    // La ponemos al final para que no choque con las rutas de género
    Route::get('/{business:slug}', [FactoryController::class, 'show'])->name('factories.show');
});

/**
 * SECCIÓN: MAYORISTAS
 */
Route::prefix('mayoristas-calzado-guanajuato')->group(function () {
    Route::get('/', [WholesalerController::class, 'index'])->name('wholesalers.index');
    Route::get('/genero/{genero}', [WholesalerController::class, 'showGenero'])->name('wholesalers.gender');
    Route::get('/genero/{genero}/tipo/{tipo}', [WholesalerController::class, 'showTipo'])->name('wholesalers.type');
    Route::get('/{business:slug}', [WholesalerController::class, 'show'])->name('wholesalers.show');
});

/**
 * SECCIÓN: MINORISTAS
 */
Route::prefix('minoristas-calzado-guanajuato')->group(function () {
    Route::get('/', [RetailerController::class, 'index'])->name('retailers.index');
    Route::get('/genero/{genero}', [RetailerController::class, 'showGenero'])->name('retailers.gender');
    Route::get('/genero/{genero}/tipo/{tipo}', [RetailerController::class, 'showTipo'])->name('retailers.type');
    Route::get('/{business:slug}', [RetailerController::class, 'show'])->name('retailers.show');
});


// Ruta para trackear clicks de negocios
Route::post('/tracking/click/{business}', [TrackingController::class, 'store'])->name('tracking.click');

//Advertise
Route::get('/anunciate', Advertise::class)->name('web.advertise');

//Beneficios
//Route::get('/beneficios', BeneficiosController::class)->name('web.beneficios');

// --- Rutas de Administración (Breeze/Livewire) ---
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

//-- Server Routes --//
Route::get('/preparar-servidor/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return "✅ Caché del servidor optimizada.";
});
