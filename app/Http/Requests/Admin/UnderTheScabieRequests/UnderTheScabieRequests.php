<?php

namespace App\Http\Requests\Admin\UnderTheScabieRequests;

use Illuminate\Foundation\Http\FormRequest;

class UnderTheScabieRequests extends FormRequest
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
            'job_id'=>'required|exists:jobs,id',
            'administration_id'=>'required|exists:administrations,id',
            'section_id'=>'required|exists:sections,id',
            'direct_admin_name'=>'required',
            'date_of_being_hired'=>'required',
            'performance_appraisal_date'=>'required',
            'maintain_working_hours'=>'required',
            'good_productivity_performance'=>'required',
            'production_quantity'=>'required',
            'learning_ability'=>'required',
            'work_progress'=>'required',
            'adhere_to_the_directives_instructions'=>'required',
            'initiative_and_quick_wit'=>'required',
            'relationship_with_colleagues'=>'required',
            'ability_to_organize_work'=>'required',
            'take_advantage_of_working_time'=>'required',
            'direct_administrators_recommendation'=>'required',
            'notes'=>'required',
        ];
    }
}
