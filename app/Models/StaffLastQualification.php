<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffLastQualification extends Model 
{

    protected $table = 'staff_last_qualification';
    public $timestamps = true;
    protected $fillable = array('qualification', 'place_name', 'country', 'city', 'from', 'to', 'specialize', 'staff_id');

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

}