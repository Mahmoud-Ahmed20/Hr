<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeId extends Model
{

    protected $table = 'employees_id';
    public $timestamps = true;
    protected $fillable = array('card_id', 'place_of_issue', 'date_of_issue', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
