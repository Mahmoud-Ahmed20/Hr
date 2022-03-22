<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffServiceActions extends Model
{

    protected $table = 'staffserviceactions';
    public $timestamps = true;

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
    public function to_staff()
    {
        return $this->belongsTo(Staff::class, 'to_staff_id');
    }
    public function he_has()
    {
        return $this->belongsTo(Staff::class, 'he_has');
    }
    public function code_numbers_note()
    {
        return $this->belongsTo(Staff::class, 'code_numbers_note');
    }
    public function employee_special_work()
    {
        return $this->belongsTo(Staff::class, 'employee_special_work');
    }
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }



}
