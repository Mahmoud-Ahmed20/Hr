<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MissionsAccomplishment extends Model 
{

    protected $table = 'missions_accomplishment';
    public $timestamps = true;
    protected $fillable = array('staff_id', 'number', 'work_date', 'job_id', 'section_id', 'administration_id', 
                                'duration_of_mission', 'direction_of_the_mission', 'start_working_at', 'leaving_date', 
                                'mission_details', 'results', 'archive');

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }

    public function staff(){
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function job(){
        return $this->belongsTo(Job::class, 'job_id');
    }
    
    public function section(){
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function administration(){
        return $this->belongsTo(Administration::class, 'administration_id');
    }
}