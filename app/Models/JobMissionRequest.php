<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobMissionRequest extends Model 
{

    protected $table = 'job_mission_requests';
    public $timestamps = true;
    protected $fillable = array('location', 'staff_id', 'number', 'date', 'job_title', 'administration_id', 'section_id', 'direction_of_the_mission',
                                'duration_of_mission', 'date_from', 'date_to', 'mission_specification', 'expense_advance', 
                                'ticket', 'archive');

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }

    public function visas()
    {
        return $this->hasMany(JobMissionRequestVisas::class, 'job_mission_id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }
    public function administration()
    {
        return $this->belongsTo(Administration::class,'administration_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

}