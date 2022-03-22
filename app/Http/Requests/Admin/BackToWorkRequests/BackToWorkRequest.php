<?php

namespace App\Http\Requests\Admin\BackToWorkRequests;

use Illuminate\Foundation\Http\FormRequest;

class BackToWorkRequest extends FormRequest
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
            'date' => 'required',
            'Staff_id' => 'required|exists:staffs,id',
            'job_number' => 'required',
            'job_title' => 'required',
            'reason_for_leave' => 'required',
            'first_day_off' => 'required',
            'last_date_off' => 'required',
            'date_word_resumed' => 'required',
            'no_of_actual_vacation_days' => 'required',
            'hr_total_no_actual_vacation_days' => 'required',
            'hr_difference_between_vacation_days' => 'nullable',
        ];
    }
}
