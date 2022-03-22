<?php

namespace App\Http\Requests\Admin\jobRequests;

use Illuminate\Foundation\Http\FormRequest;

class jobRequests extends FormRequest
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
            'name_job'=>'required',
            'administration_id'=>'required|exists:administrations,id'
        ];
    }
}
