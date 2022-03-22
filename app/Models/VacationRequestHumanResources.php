<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacationRequestHumanResources extends Model 
{

    protected $table = 'vacation_request_human_resources';
    public $timestamps = true;
    protected $fillable = array('previous_return_date', 'paid_leave', 'unpaid_leave', 'unpaid_leave_per_year', 'holidays', 
                                'notes_tow', 'is_the_passport_valid', 'cover_the_duration_of_the_visa', 
                                'is_the_residence_permit_valid', 'vacation_id');

    public function vocation_request()
    {
        return $this->belongsTo(VocationRequest::class, 'vacation_id');
    }

}