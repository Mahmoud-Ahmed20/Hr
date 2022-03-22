<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRequests extends Model
{
    use HasFactory;
    protected $table = 'loan_requests';
    protected $fillable = [
        'staff_id',
        'job_id',
        'number',
        'section_id',
        'administration_id',
        'going_date',
        'basic_salary',
        'advance_value',
        'direct_manager',
        'direct_manager_nots',
        'hr',
        'hr_nots',
        'the_accountant',
        'the_accountant_nots',
        'is_activate',
        'archive'
    ];
    public $timestamps= false;
    public function scopeDeleteArchive($query)
    {
        return $query->where('archive',0);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class,'job_id');
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
