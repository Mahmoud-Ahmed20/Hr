<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobMissionRequestVisas extends Model 
{

    protected $table = 'job_mission_request_visas';
    public $timestamps = true;
    protected $fillable = array('name', 'job_mission_id');

    public function job_mission()
    {
        return $this->belongsTo(JobMissionRequest::class, 'job_mission_id');
    }

}