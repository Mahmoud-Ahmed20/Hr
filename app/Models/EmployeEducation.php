<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeEducation extends Model
{

    protected $table = 'employees_educations';
    public $timestamps = true;
    protected $fillable = array('place_name', 'country', 'city', 'from', 'to', 'specialize', 'grade', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
