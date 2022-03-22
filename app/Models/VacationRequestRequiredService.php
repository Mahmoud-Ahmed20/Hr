<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacationRequestRequiredService extends Model 
{

    protected $table = 'vacation_request_required_service';
    public $timestamps = true;
    protected $fillable = array('exit_and_return_visa', 'country_visa', 'ticket_reservation', 'ticket_reimbursement', 
                                'notes_one', 'date_travel', 'air_line', 'line', 'vocation_id');

    public function vocation_request()
    {
        return $this->belongsTo(VocationRequest::class, 'vacation_id');
    }

}