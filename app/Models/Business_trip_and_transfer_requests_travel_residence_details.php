<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business_trip_and_transfer_requests_travel_residence_details extends Model
{

    protected $table = 'business_trip_and_transfer_requests_travel_residence_details';
    public $timestamps = true;

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }


}
