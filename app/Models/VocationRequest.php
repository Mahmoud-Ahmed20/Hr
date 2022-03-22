<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VocationRequest extends Model 
{

    protected $table = 'vocation_requests';
    public $timestamps = true;
    protected $fillable = array('request_date', 'Staff_id', 'job_title', 'job_number', 'first_day_off', 'last_date_off', 
                                'address_in_vacation', 'phone', 'reason_for_leave', 'archive');

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }

    public function required_service()
    {
        return $this->hasOne(VacationRequestRequiredService::class, 'vacation_id');
    }

    public function persons()
    {
        return $this->hasMany(VacationRequestPersons::class, 'vacation_id');
    }

    public function human_resources()
    {
        return $this->hasOne(VacationRequestHumanResources::class, 'vacation_id');
    }
    
    public function staff()
    {
        return $this->belongsTo(Staff::class,'Staff_id');
    }



}