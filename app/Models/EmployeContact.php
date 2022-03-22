<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeContact extends Model
{

    protected $table = 'employees_contact';
    public $timestamps = true;
    protected $fillable = array('mobile', 'email', 'post', 'home_phone', 'work_phone', 'present_adderss', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
