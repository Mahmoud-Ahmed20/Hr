<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeCompanyPrevious extends Model
{

    protected $table = 'employees_company_previous';
    public $timestamps = true;
    protected $fillable = array('from', 'to', 'name_of_org', 'address', 'telephone', 'job_title', 'description', 'salary', 'allowance', 'reason_for_quit', 'employe_id');

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
