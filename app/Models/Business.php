<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SaleType;
use App\Models\ShoeModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    // Esto permite que Filament guarde todos los campos sin restricciones
    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function saleType(): BelongsTo
    {
        return $this->belongsTo(SaleType::class);
    }

    // Relación: Un negocio puede tener muchos registros premium (historial)
    public function premiums(): HasMany
    {
        return $this->hasMany(Premium::class);
    }

    /**
     * Cuántos modelos tiene una fábrica específica.
    */
    public function shoeModels(): HasMany
    {
        return $this->hasMany(ShoeModel::class);
    }

    /**
    * Rastreo de clicks
    */

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }



    /**
     * Scope para filtrar solo negocios premium vigentes
     */
    public function scopeActivePremium($query)
    {
        return $query->whereHas('premiums', function ($q) {
            $q->where('start_date', '<=', now())
              ->where('end_date', '>=', now());
        });
    }
}
