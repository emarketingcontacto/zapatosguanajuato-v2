<?php

namespace App\Models;

use App\Models\Business;
use App\Models\Material;
use App\Models\Season;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ShoeModel extends Model
{
    protected $guarded = [];

    /**
     * El zapato pertenece a un Negocio (Fábrica/Vendedor)
     */
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    /**
     * El zapato está hecho de un //Material
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    /**
     * El zapato pertenece a una Temporada
     */
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * El modelo de zapato pertenece a un Genero
     */
    public function subcategory(): BelongsTo
{
    return $this->belongsTo(Subcategory::class);
}
}
