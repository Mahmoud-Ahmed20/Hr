<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacationRequestPersons extends Model 
{

    protected $table = 'vacation_request_persons';
    public $timestamps = true;
    protected $fillable = array('name', 'age', 'person_id', 'vacation_id');

    public function vocation_request()
    {
        return $this->belongsTo(VocationRequest::class, 'vacation_id');
    }

}