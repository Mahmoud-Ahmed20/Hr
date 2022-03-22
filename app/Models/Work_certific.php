<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work_certific extends Model
{

    protected $table = 'work_certific';
    public $timestamps = true;

    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }

    public function staff(){
        return $this->belongsTo(Staff::class, 'staff_id');
    }

}
