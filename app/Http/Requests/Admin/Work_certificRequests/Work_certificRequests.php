<?php

namespace App\Http\Requests\Admin\Work_certificRequests;

use Illuminate\Foundation\Http\FormRequest;

class Work_certificRequests extends FormRequest
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
            'staff_id' => 'required',
            'date' => 'required',
            'job_title' => 'required',
            'start_work' => 'required',
            'end_work' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'job_title.required' => 'يرجي ملىء خانه المسمي الوظيفي',
            'date.required' => 'يرجي ملىء خانه التاريخ',
            'start_work.required' => 'يرجي ملىء خانه تاريخ بداء الخدمة',
            'end_work.required' => 'يرجي ملىء خانه تاريخ نهاية الخدمة',
        ];
    }
}
