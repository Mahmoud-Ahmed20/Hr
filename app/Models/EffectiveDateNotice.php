<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EffectiveDateNotice extends Model
{

    protected $table = 'effective_date_notice';
    public $timestamps = true;
    protected $fillable = array(
        'staff_id',
        'job_id',
        'id_number',
        'administration_id',
        'section_id',
        'nationality_id',
        'start_working_at',
        'archive'
    );

	public function scopeNotArchive($query){
		return $query->where('archive', 0);
	}
    
    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class,'job_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class,'nationality_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function administration()
    {
        return $this->belongsTo(Administration::class,'administration_id');
    }
}
