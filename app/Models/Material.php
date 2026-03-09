<?php

namespace App\Models;

use App\Models\ShoeModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    protected $guarded = [];

    /**
     * Contador de materiales
     */
     public function shoeModels(): HasMany
    {
        return $this->hasMany(ShoeModel::class);
    }
}
