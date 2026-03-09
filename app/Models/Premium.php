<?php

namespace App\Models;

use App\Models\Business;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    protected $table = 'premiums';
    protected $fillable = [
        'business_id', 'start_date', 'end_date'
    ];

    public function business()
        {
            return $this->belongsTo(Business::class);
        }
}
