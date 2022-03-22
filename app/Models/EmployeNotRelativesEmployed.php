<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeNotRelativesEmployed extends Model
{

    protected $table = 'employees_not_relatives_employed';
    public $timestamps = true;
    protected $fillable = array('name', 'position', 'company', 'telephone', 'address', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
