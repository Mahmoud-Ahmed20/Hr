<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business_trip_and_transfer_requests_managers extends Model
{

    protected $table = 'business_trip_and_transfer_requests_managers';
    public $timestamps = true;

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }


}
