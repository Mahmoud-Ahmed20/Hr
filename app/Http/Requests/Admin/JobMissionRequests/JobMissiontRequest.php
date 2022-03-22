<?php

namespace App\Http\Requests\Admin\JobMissionRequests;

use Illuminate\Foundation\Http\FormRequest;

class JobMissiontRequest extends FormRequest
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
            'location' => 'required',
            'Staff_id' => 'required|exists:staffs,id',
            'number' => 'required',
            'date' => 'required',
            'job_title' => 'required',
            'administration_id' => 'required|exists:administrations,id',
            'section_id' => 'required|exists:sections,id',
            'direction_of_the_mission' => 'required',
            'duration_of_mission' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'mission_specification' => 'required',
            'expense_advance' => 'required',
            'ticket' => 'required',
            'visas.*.name' => 'required',
        ];
    }
}
