<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenaltyProcedures extends Model
{

    protected $table = 'penalty_procedures';
    public $timestamps = true;
    protected $fillable = array('staff_id', 'section_id', 'joining_date', 'administration_id', 'job_title', 'last_penalty', 'subject',
                                'number', 'draw_attention', 'penalty', 'deduction', 'written_warning_by_fired', 'others',
                                'stopping_from_work_for', 'stopping_the_yearly_increase', 'firing_with_a_bying',
                                'firing_without_a_bying', 'archive');
	public function scopeNotArchive($query){
		return $query->where('archive', 0);
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
