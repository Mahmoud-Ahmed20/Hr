<?php

namespace App\Http\Requests\Admin\jobOfferRequests;

use Illuminate\Foundation\Http\FormRequest;

class jobOfferRequests extends FormRequest
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
            'name' =>'required',
            'nationality_id'=>'exists:nationalitys,id|required',
            'date'=>'required',
            'national_id'=>'required',
            'issue_id'=>'required',
            'issue_id_data'=>'required',
            'job_id'=>'exists:jobs,id|required',
            'degree_job'=>'required',
            'qualification'=>'required',
            'administration_id'=>'exists:administrations,id|required',
            'branch'=>'required',
            'degree'=>'required',
            'year_contract'=>"required",
            'basic_salary_monthly'=>'required',
            'basic_salary_Year'=>'required',
            'yearly_vacation'=>'required',
            'treatment'=>'required',
            'Probation'=>'required',
            'employees_job_offer_specification_id'=>'exists:employees_job_offer_specification,id',
        ];
    }
}
