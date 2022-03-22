<?php

namespace App\Http\Requests\Admin\Notice_absence_employeeRequests;

use Illuminate\Foundation\Http\FormRequest;

class Notice_absence_employeeRequests extends FormRequest
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
            'section_id' => 'required',
            'job_id' => 'required',
            'staff_id' => 'required',
            'staff_number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'staff_number.required' => 'يرجي ملىء خانه رقم الموظف',
            'section_id.required' => 'يرجي ملىء خانه القسم',
            'job_id.required' => 'يرجي ملىء خانه الوظيفه',
            'staff_id.required' => 'يرجي ملىء خانه اسم الموظف',
        ];
    }
}
