<?php

namespace App\Http\Requests\Admin\job_descriptionRequests;

use Illuminate\Foundation\Http\FormRequest;

class job_descriptionRequests extends FormRequest
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
            'administration_id' => 'required',
            'staff_id' => 'required',
            'job_title' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'job_title.required' => 'يرجي ملىء خانه اسم الوظيفه',
            'section_id.required' => 'يرجي ملىء خانه القسم',
            'administration_id.required' => 'يرجي ملىء خانه الاداره',
            'staff_id.required' => 'يرجي ملىء خانه اسم الموظف',
        ];
    }
}
