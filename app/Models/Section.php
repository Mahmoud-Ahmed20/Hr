<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    public $timestamps= true;
    protected $fillable = [
        'name',
        'archive',
        'is_activate'
    ];
    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }

    public function employeeServiceAction()
    {
        return $this->hasMany(EmployeeServiceActions::class, 'section_id');
    }

    public function scopeDeleteArchive($query)
    {
            return $query->where('archive',0);
    }

    public function Staff()
    {
        return $this->hasOne(Staff::class,'section_id');
    }

    public function PenaltyProcedures()
    {
        return $this->hasOne(PenaltyProcedures::class,'section_id');
    }

    public function JobMissionRequest()
    {
        return $this->hasOne(JobMissionRequest::class,'section_id');
    }

    public function EffectiveDateNotice()
    {
        return $this->hasOne(EffectiveDateNotice::class,'section_id');
    }

    public function EvaluatePersonalInterview()
    {
        $this->hasOne(EvaluatePersonalInterview::class,'section_id');
    }

    public function missionsAccomplishment()
    {
        return $this->hasMany(MissionsAccomplishment::class,'section_id');
    }
    public function UnderTheScabies()
    {
        return $this->hasOne(UnderTheScabies::class,'section_id');
    }
}
