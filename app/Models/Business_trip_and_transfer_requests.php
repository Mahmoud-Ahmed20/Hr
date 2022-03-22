<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business_trip_and_transfer_requests extends Model
{

    protected $table = 'business_trip_and_transfer_requests';
    public $timestamps = true;

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }
    public function expenses()
    {
        return $this->hasMany(Business_trip_and_transfer_requests_travel_expenses::class, 'request_id');
    }
    public function manager()
    {
        return $this->hasMany(Business_trip_and_transfer_requests_managers::class, 'request_id');
    }
    public function residence_details()
    {
        return $this->hasMany(Business_trip_and_transfer_requests_travel_residence_details::class, 'request_id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'name');
    }
    public function nationalityRow()
    {
        return $this->belongsTo(Nationality::class, 'nationality');
    }
}
