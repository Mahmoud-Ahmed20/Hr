<?php

namespace App\Http\Requests\Admin\EvaluateRequests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluateStoreRequest extends FormRequest
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
            'job_id' => 'required|exists:jobs,id',
            'qualification' => 'required',
            'section_id' => 'required|exists:sections,id',
            'extierior' => 'required',
            'personal' => 'required',
            'team_work' => 'required',
            'initiatire' => 'required',
            'english' => 'required',
            'ambition' => 'required',
            'make_decision' => 'required',
            'experience' => 'required',
            'skills' => 'required',
            'qualification_skills' => 'required',
            'interview_status' => 'required',
            'notes' => 'nullable',
            'interview_date' => 'required',
        ];
    }
}
