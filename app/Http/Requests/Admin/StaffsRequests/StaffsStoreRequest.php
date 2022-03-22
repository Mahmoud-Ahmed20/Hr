<?php

namespace App\Http\Requests\Admin\StaffsRequests;

use Illuminate\Foundation\Http\FormRequest;

class StaffsStoreRequest extends FormRequest
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
            'name' => 'required',
            'id_number' => 'required',
            'job_id' => 'required|exists:jobs,id',
            'section_id' => 'required|exists:sections,id',
            'nationality_id' => 'required|exists:nationalitys,id',
            'date_of_birth' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'present_adderss' => 'required',
            'post' => 'required',
            'mobile' => 'required',
            'home_phone' => 'required',
            'salary_system' => 'required',
            'have_you_any_dependents' => 'required',
            'dependents_address' => 'required',

            'category' => 'required',
            'number' => 'required',
            'date_of_issue' => 'required',
            'place_of_issue' => 'required',
            'expiry_date' => 'required',
            'blood_group' => 'required',
            'from' => 'required',
            'to' => 'required',

            'job_title_last_job' => 'required',
            'bisic_salary' => 'required',
            'allowance' => 'required',
            'company_name' => 'required',
            'reason_for_leaving' => 'required',
            'description_for_your_duties' => 'required',
            'address' => 'required',
            'phone' => 'required',

            'qualification' => 'required',
            'place_name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'from_qualification' => 'required',
            'to_qualification' => 'required',
            'specialize' => 'required',

            'salaries.*.salary' => 'required',
            'salaries.*.type' => 'nullable',
            'salaries.*.current_housing' => 'required',
            'salaries.*.current_transportation' => 'required',
            'salaries.*.other_allowances' => 'required',

            'card_id' => 'required',
            'card_place_of_issue' => 'required',
            'card_date_of_issue' => 'required',
        ];
    }
}
