<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeDrivingLicence extends Model
{

    protected $table = 'employees_driving_licence';
    public $timestamps = true;
    protected $fillable = array('number', 'expiry_date', 'blood_group', 'category', 'date_of_issue', 'place_of_issue', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
