<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffSalary extends Model
{

    protected $table = 'staff_salaries';
    public $timestamps = true;
    protected $fillable = array('salary', 'current_housing', 'current_transportation', 'other_allowances', 'type', 'staff_id');

    public function scopeCurrentSalary($query)
    {
        return $query->where('type', 1)->first();
    }

    public function scopePreviousSalary($query)
    {
        return $query->where('type', 0)->first();
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
    // public function VocationRequestNameEmploye()
    // {
    //     return $this->hasOne(VocationRequest::class,'Staff_id');
    // }

}
