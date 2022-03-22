<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeDependents extends Model
{

    protected $table = 'employees_dependents';
    public $timestamps = true;
    protected $fillable = array('name', 'age', 'relation', 'address', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
