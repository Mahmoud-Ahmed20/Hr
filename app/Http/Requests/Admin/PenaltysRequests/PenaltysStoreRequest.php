<?php

namespace App\Http\Requests\Admin\PenaltysRequests;

use Illuminate\Foundation\Http\FormRequest;

class PenaltysStoreRequest extends FormRequest
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
            'section_id' => 'required|exists:sections,id',
            'joining_date' => 'required',
            'administration_id' => 'required|exists:administrations,id',
            'job_title' => 'required',
            'last_penalty' => 'required',
            'subject' => 'required',
            'draw_attention' => 'nullable',
            'penalty' => 'nullable',
            'deduction' => 'nullable',
            'written_warning_by_fired' => 'nullable',
            'others' => 'nullable',
            'stopping_from_work_for' => 'nullable',
            'stopping_the_yearly_increase' => 'nullable',
            'firing_with_a_bying' => 'nullable',
            'firing_without_a_bying' => 'nullable',
        ];
    }
}
