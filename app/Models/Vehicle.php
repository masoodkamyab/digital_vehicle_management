<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'date_acquired', 'parking_location', 'license_plate_number'];
    public function inspections()
    {
        return $this->hasMany(Inspection::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
