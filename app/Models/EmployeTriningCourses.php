<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeTriningCourses extends Model
{

    protected $table = 'employees_trining_courses';
    public $timestamps = true;
    protected $fillable = array('name_of_institute', 'country', 'city', 'from', 'to', 'specialize', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
