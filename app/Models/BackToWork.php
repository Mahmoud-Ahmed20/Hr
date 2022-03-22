<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BackToWork extends Model 
{

    protected $table = 'back_to_work';
    public $timestamps = true;
    protected $fillable = array('date', 'Staff_id', 'job_number', 'job_title', 'reason_for_leave', 'first_day_off', 'last_date_off',
                                'date_word_resumed', 'no_of_actual_vacation_days', 'hr_total_no_actual_vacation_days', 
                                'hr_difference_between_vacation_days', 'archive');

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class,'Staff_id');
    }

}