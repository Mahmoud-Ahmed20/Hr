<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffId extends Model
{

    protected $table = 'staffs_id';
    public $timestamps = true;
    protected $fillable = array('card_id', 'place_of_issue', 'date_of_issue', 'staff_id');

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
