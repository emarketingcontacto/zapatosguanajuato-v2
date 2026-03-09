<?php

namespace App\Models;

use App\Models\ShoeModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date'
    ];

    /**
     * Cuantos modelos pertenecen a esta temporada
     */
     public function shoeModels(): HasMany
    {
        return $this->hasMany(ShoeModel::class);
    }
}
