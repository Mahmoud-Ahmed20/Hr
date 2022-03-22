<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOfferSalariesSpecification extends Model
{
    use HasFactory;

    protected $table = 'job_offer_salaries_specification';
    protected $fillable = [
        'basic_salary_monthly',
        'basic_salary_Year',
        'housing_allowance_monthly',
        'housing_allowance_Year',
        'switch_connectors_monthly',
        'switch_connectors_Year',
        'employees_job_offer_specification_id'
    ];
    public $timestamps= true;
    public function scopeDeleteArchive($query)
    {
        return $query->where('archive',0);
    }
    public function jobOffer()
    {
        return $this->belongsTo(JobOfferSpecification::class,'employees_job_offer_specification_id');
    }
}
