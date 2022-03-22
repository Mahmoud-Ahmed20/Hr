<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    public $timestamps= true;
    protected $fillable = [
        'name_job',
        'administration_id',
        'is_activate',
        'archive'
    ];
    // public function scopeNotArchive($query){
    //     return $query->where('archive', 0);
    // }
    public function scopeActive($query){
        return $query->where('is_activate', 1);
    }

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }
    public function scopeDeleteArchive($query)
    {
        return $query->where('archive',0);
    }

    public function employeeServiceAction()
    {
        return $this->hasMany(EmployeeServiceActions::class, 'job_id');
    }

    public function job()
    {
        return $this->hasOne(jobOfferSpecification::class,'job_id');
    }

    public function UnderTheScabies()
    {
        return $this->hasOne(UnderTheScabies::class,'job_id');
    }

    public function Staff()
    {
        return $this->hasOne(Staff::class,'job_id');
    }

    public function EffectiveDateNotice()
    {
        return $this->hasOne(EffectiveDateNotice::class,'job_id');
    }

    public function EvaluatePersonalInterview()
    {
        return  $this->hasOne(EvaluatePersonalInterview::class,'job_id');
    }

    public function missionsAccomplishment()
    {
        return $this->hasMany(MissionsAccomplishment::class,'job_id');
    }

    public function administration()
    {
        return $this->belongsTo(Administration::class,'administration_id');
    }
}
