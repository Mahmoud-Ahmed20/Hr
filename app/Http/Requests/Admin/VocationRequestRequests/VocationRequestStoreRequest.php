<?php

namespace App\Http\Requests\Admin\VocationRequestRequests;

use Illuminate\Foundation\Http\FormRequest;

class VocationRequestStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'request_date' => 'required',
            'Staff_id' => 'required|exists:staffs,id',
            'job_title' => 'required',
            'job_number' => 'required',
            'reason_for_leave' => 'required',
            'first_day_off' => 'required',
            'last_date_off' => 'required',
            'address_in_vacation' => 'required',
            'phone' => 'required',
            'exit_and_return_visa' => 'required',
            'country_visa' => 'required',
            'ticket_reservation' => 'required',
            'ticket_reimbursement' => 'required',
            'notes_tow' => 'required',
            'notes_one' => 'required',
            'date_travel' => 'required',
            'air_line' => 'required',
            'line' => 'required',
            'persons.*.person_id' => 'required',
            'persons.*.name' => 'nullable',
            'persons.*.age' => 'nullable',
            'previous_return_date' => 'required',
            'paid_leave' => 'required',
            'unpaid_leave' => 'required',
            'unpaid_leave_per_year' => 'required',
            'holidays' => 'required',
            'is_the_passport_valid' => 'required',
            'cover_the_duration_of_the_visa' => 'required',
            'is_the_residence_permit_valid' => 'required',
        ];
    }
}
