<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOfferSpecification extends Model
{
    use HasFactory;
    protected $table = 'job_offer_employees_specification';
    protected $fillable = [
        'name',
        'nationality_id',
        'date',
        'national_id',
        'issue_id',
        'issue_id_data',
        'job_id',
        'degree_job',
        'qualification',
        'administration_id ',
        'branch',
        'degree',
        'year_contract',
        'archive',
        'is_activate'
    ];
    public $timestamps= true;
    public function scopeDeleteArchive($query)
    {
        return $query->where('archive',0);
    }
    public function jobOfferSpecifincation()
    {
        return $this->belongsTo(Job::class,'job_id');
    }
    public function administration()
    {
        return $this->belongsTo(Administration::class,'administration_id');
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class,'nationality_id');
    }
    public function jobOfferSalary()
    {
        return $this->hasOne(JobOfferSalariesSpecification::class,'employees_job_offer_specification_id');
    }
    public function JobOfferSpecification()
    {
        return $this->hasone(LoanRequests::class,'name_employess_id');
    }


}
