<?php

namespace App\Http\Requests\Admin\MissionsAccomplishmentRequests;

use Illuminate\Foundation\Http\FormRequest;

class MissionsAccomplishmentStoreRequest extends FormRequest
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
            'number' => 'required',
            'work_date' => 'required',
            'administration_id' => 'required|exists:administrations,id',
            'duration_of_mission' => 'required',
            'direction_of_the_mission' => 'required',
            'start_working_at' => 'required',
            'leaving_date' => 'required',
            'mission_details' => 'required',
            'results' => 'required',
        ];
    }
}
