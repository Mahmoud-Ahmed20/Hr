<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeLanguage extends Model
{

    protected $table = 'employees_languages';
    public $timestamps = true;
    protected $fillable = array('speaking', 'reading', 'writing', 'shorthand_speed', 'typing_speed', 'other_skills', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
