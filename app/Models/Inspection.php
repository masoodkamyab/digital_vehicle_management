<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    protected $fillable = ['type', 'date', 'vehicle_name'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
