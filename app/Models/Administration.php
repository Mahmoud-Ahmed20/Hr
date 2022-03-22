<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;
    protected $table = 'administrations';
    public $timestamps = true;
    protected $fillable = [
        'name_administration',
        'is_activate',
        'delete_at',
        'archive'
    ];

    public function scopeActive($query){
        return $query->where('is_activate', 1);
    }
    
    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }

    public function scopeDeletArchive($query)
    {
        return $query->where('archive',0);
    }

    public function Administration()
    {
        return $this->hasMany(jobOfferSpecification::class,'administration_id');
    }

    public function UnderTheScabies()
    {
        return $this->hasMany(UnderTheScabies::class,'administration_id');
    }

    public function PenaltyProcedures()
    {
        return $this->hasMany(PenaltyProcedures::class,'administration_id');
    }

    public function JobMissionRequest()
    {
        return $this->hasMany(JobMissionRequest::class,'administration_id');
    }

    public function EffectiveDateNotice()
    {
        return $this->hasMany(EffectiveDateNotice::class,'administration_id');
    }

    public function missionsAccomplishment()
    {
        return $this->hasMany(MissionsAccomplishment::class,'administration_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class,'administration_id');
    }
}
