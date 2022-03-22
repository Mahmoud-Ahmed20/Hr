<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluatePersonalInterview extends Model
{

    protected $table = 'evaluate_personal_interviews';
    public $timestamps = true;
    protected $fillable = array('name', 'qualification', 'job_id', 'section_id', 'extierior', 'personal',
                                'team_work', 'initiatire', 'english', 'ambition', 'make_decision', 'experience',
                                'skills', 'qualification_skills', 'notes', 'interview_status', 'interview_date', 'archive');

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    public function job()
    {
       return $this->belongsTo(Job::class,'job_id');
    }

}
