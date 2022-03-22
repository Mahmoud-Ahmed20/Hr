<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowCars extends Model
{

    protected $table = 'follow_cars';
    public $timestamps = true;
    protected $fillable = array('car_type', 'plate_number', 'color', 'model', 'owner_name', 'license_expiration',
                                'insurance_expiry', 'driving_auth_expiry_1', 'driving_auth_expiry_2', 'driver_name', 'archive');

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }

}
