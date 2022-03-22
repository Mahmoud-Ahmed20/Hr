<?php

namespace App\Http\Requests\Admin\EffectiveDateNoticeRequests;

use Illuminate\Foundation\Http\FormRequest;

class EffectiveDateNoticeRequest extends FormRequest
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
            'id_number' => 'required',
            'administration_id' => 'required|exists:administrations,id',
            'section_id' => 'required|exists:sections,id',
            'nationality_id' => 'required|exists:nationalitys,id',
            'start_working_at' => 'required',
        ];
    }
}
