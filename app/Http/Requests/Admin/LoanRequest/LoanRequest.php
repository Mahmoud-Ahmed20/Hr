<?php

namespace App\Http\Requests\Admin\LoanRequest;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
            'staff_id' => 'required|exists:staffs,id',
            'job_id' => 'required|exists:jobs,id',
            'section_id' => 'required|exists:sections,id',
            'administration_id' => 'required|exists:administrations,id',
            'number' => 'required',
            'going_date' => 'required',
            'basic_salary' => 'required',
            'advance_value' => 'required',
            'direct_manager' => 'required',
            'direct_manager_nots' => 'required',
            'hr' => 'required',
            'hr_nots' => 'required',
            'the_accountant' => 'required',
            'the_accountant_nots' => 'required',
        ];
    }
}
