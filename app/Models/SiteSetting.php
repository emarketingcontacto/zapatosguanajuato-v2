<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'label',
        'type',
    ];

    public function setKeyAttribute($value)
    {
        $this->attributes['key'] = strtolower($value);
    }
}
