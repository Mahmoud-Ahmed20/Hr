<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    protected $table = 'staffs';
    public $timestamps = true;
    protected $fillable = array('name', 'id_number', 'job_id', 'section_id', 'nationality_id', 'date_of_birth', 'religion',
                                'marital_status', 'present_adderss', 'post', 'mobile', 'home_phone', 'have_you_any_dependents',
                                'dependents_address', 'salary_system', 'archive');

    public function scopeNotArchive($query){
		return $query->where('archive', 0);
	}
    
    public function employeeServiceAction()
    {
        return $this->hasMany(StaffServiceActions::class, 'staff_id');
    }

    public function lastJob()
    {
        return $this->hasOne(StaffLastJob::class,'staff_id');
    }

    public function cardId()
    {
        return $this->hasOne(StaffId::class,'staff_id');
    }

    public function qualification()
    {
        return $this->hasOne(StaffLastQualification::class,'staff_id');
    }

    public function salaries()
    {
        return $this->hasMany(StaffSalary::class,'staff_id');
    }

    public function drivingLicence()
    {
        return $this->hasOne(StaffDrivingLicence::class,'staff_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class,'job_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class,'nationality_id');
    }

    public function VocationRequests()
    {
        return $this->hasMany(VocationRequest::class,'staff_id');
    }

    public function backRequests()
    {
        return $this->hasMany(BackToWork::class,'Staff_id');
    }

    public function PenaltyProceduresNameEmploye()
    {
        return $this->hasOne(PenaltyProcedures::class,'Staff_id');

    }

    public function JobMissionRequestNameEmploye()
    {
        return $this->hasOne(JobMissionRequest::class,'Staff_id');
    }

    public function EffectiveDateNoticeNameEmploye()
    {
        return $this->hasOne(EffectiveDateNotice::class,'Staff_id');
    }

    public function NameSections()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function missionsAccomplishment()
    {
        return $this->hasMany(MissionsAccomplishment::class,'staff_id');
    }
    public function UnderTheScabies()
    {
        return $this->hasone(UnderTheScabies::class,'Staff_id');
    }
    public function PerformanceStandardsTemplateEmployee()
    {
        return $this->hasOne(PerformanceStandardsTemplateEmployee::class,'Staff_id');
    }
}
