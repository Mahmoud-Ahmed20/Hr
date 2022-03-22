<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeSkill extends Model
{

    protected $table = 'employees_skills';
    public $timestamps = true;
    protected $fillable = array('skills', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
