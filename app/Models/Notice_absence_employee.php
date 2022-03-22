<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice_absence_employee extends Model
{

    protected $table = 'notice_absence_employee';
    public $timestamps = true;

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

}
