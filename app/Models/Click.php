<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [
        'business_id',
        'click_type',
        'platform',
        'ip_address'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
