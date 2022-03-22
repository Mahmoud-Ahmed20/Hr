<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business_trip_and_transfer_requests_travel_expenses extends Model
{

    protected $table = 'business_trip_and_transfer_requests_expenses';
    public $timestamps = true;

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }


}
