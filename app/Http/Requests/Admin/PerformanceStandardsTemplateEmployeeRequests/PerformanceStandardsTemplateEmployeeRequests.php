<?php

namespace App\Http\Requests\Admin\PerformanceStandardsTemplateEmployeeRequests;

use Illuminate\Foundation\Http\FormRequest;

class PerformanceStandardsTemplateEmployeeRequests extends FormRequest
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
            'staff_id'=>'required|exists:staffs,id',
            'job_title'=>'required',
            'understand_business_rules'=>'required',
            'get_work_done'=>'required',
            'responding_to_work_pressure'=>'required',
            'initiative_and_innovation_at_work'=>'required',
            'accept_directives_from_managers'=>'required',
            'flexibility_and_adaptability'=>'required',
            'make_decisions_and_take_responsibility'=>'required',
            'personal_cleanliness'=>'required',
            'adhere_to_corporate_policies'=>'required',
            'teamwork'=>'required',
            'understand_notes'=>'nullable',
            'get_work_done_notes'=>'nullable',
            'responding_to_work_pressure_notes'=>'nullable',
            'initiative_and_innovation_at_work_notes'=>'nullable',
            'accept_directives_from_managers_notes'=>'nullable',
            'flexibility_and_adaptability_notes'=>'nullable',
            'make_decisions_and_take_responsibility_notes'=>'nullable',
            'personal_cleanliness_notes'=>'nullable',
            'adhere_to_corporate_policies_notes'=>'nullable',
            'teamwork_notes'=>'nullable'
        ];
    }
}
