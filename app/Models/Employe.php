<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{

    protected $table = 'employees';
    public $timestamps = true;
    protected $fillable = array('city', 'position_applied_of', 'photo', 'first_name', 'father_name', 'grandfather_name',
                                'family_name', 'birth', 'place_of_birth', 'nationality', 'religion', 'marital_status',
                                'employed_by_this_company', 'start_working', 'employed_now', 'dependents',
                                'G_O_S_I_O_available', 'minimum_salary_required', 'other_data', 'judicial_ruling',
                                'reason_judicial_ruling', 'get_to_know_the_job', 'archive');

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }

    public function card()
    {
        return $this->hasOne(EmployeId::class, 'employe_id');
    }

    public function passport()
    {
        return $this->hasOne(EmployePassport::class, 'employe_id');
    }

    public function contact()
    {
        return $this->hasOne(EmployeContact::class, 'employe_id');
    }

    public function people_dependents()
    {
        return $this->hasMany(EmployeDependents::class, 'employe_id');
    }

    public function company_privious()
    {
        return $this->hasMany(EmployeCompanyPrevious::class, 'employe_id');
    }

    public function driving()
    {
        return $this->hasOne(EmployeDrivingLicence::class, 'employe_id');
    }

    public function educations()
    {
        return $this->hasMany(EmployeEducation::class, 'employe_id');
    }

    public function trining_courses()
    {
        return $this->hasMany(EmployeTriningCourses::class, 'employe_id');
    }

    public function skill()
    {
        return $this->hasOne(EmployeSkill::class, 'employe_id');
    }

    public function languages()
    {
        return $this->hasMany(EmployeLanguage::class, 'employe_id');
    }

    public function relatives_employed()
    {
        return $this->hasMany(EmployeRelativesEmployed::class, 'employe_id');
    }

    public function not_relatives_employed()
    {
        return $this->hasMany(EmployeNotRelativesEmployed::class, 'employe_id');
    }

}
