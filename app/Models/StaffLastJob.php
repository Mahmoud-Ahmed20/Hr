<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffLastJob extends Model
{

    protected $table = 'staff_last_job';
    public $timestamps = true;
    protected $fillable = array('from', 'to', 'job_title', 'bisic_salary', 'allowance', 'company_name', 'reason_for_leaving',
                                'description_for_your_duties', 'address', 'phone', 'staff_id');

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

}
