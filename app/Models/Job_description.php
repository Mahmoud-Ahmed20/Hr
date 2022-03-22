<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_description extends Model
{

    protected $table = 'job_description';
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
    public function administration()
    {
        return $this->belongsTo(Administration::class, 'administration_id');
    }

}
