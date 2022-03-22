<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffDrivingLicence extends Model 
{

    protected $table = 'staff_driving_licence';
    public $timestamps = true;
    protected $fillable = array('category', 'number', 'date_of_issue', 'place_of_issue', 'expiry_date', 'blood_group', 'staff_id');

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

}