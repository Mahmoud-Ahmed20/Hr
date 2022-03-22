<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeRelativesEmployed extends Model
{

    protected $table = 'employees_relatives_employed';
    public $timestamps = true;
    protected $fillable = array('name', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
