<?php

namespace App\Models;

use App\Models\ShoeModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcategory extends Model
{
    protected $guarded = [];

    /**
     * Una subcategoría (ej: Bota) tiene muchos modelos de zapatos
     */
    public function shoeModels(): HasMany
    {
        return $this->hasMany(ShoeModel::class);
    }
}
