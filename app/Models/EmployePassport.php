<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployePassport extends Model
{

    protected $table = 'employees_passport';
    public $timestamps = true;
    protected $fillable = array('passport', 'place_of_issue', 'date_of_issue', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
