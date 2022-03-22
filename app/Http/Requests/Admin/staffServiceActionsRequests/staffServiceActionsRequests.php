<?php

namespace App\Http\Requests\Admin\staffServiceActionsRequests;

use Illuminate\Foundation\Http\FormRequest;

class staffServiceActionsRequests extends FormRequest
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
            'action_type' => 'required',
            'section_id' => 'required',
            'job_id' => 'required',
            'staff_id' => 'required',
//            'position_applied_of' => 'required',
//            'religion' => 'required',
//            'nationality' => 'required',
//            'place_of_birth' => 'required',
//            'birth' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'section_id.required' => 'يرجي ملىء خانه القسم',
            'action_type.required' => 'يرجي ملىء خانه نوع الاجراء',
            'job_id.required' => 'يرجي ملىء خانه الوظيفه',
            'staff_id.required' => 'يرجي ملىء خانه اسم الموظف',
//            'birth.required' => 'يرجي ملىء خانه تاريخ الميلاد Date of birth	',
//            'place_of_birth.required' => 'يرجي ملىء خانه مكان الميلاد Place of birth	',
//            'nationality.required' => 'يرجي ملىء خانه الجنسية Nationality',
//            'religion.required' => 'يرجي ملىء خانه  الديانة Religion',
            //            'position_applied_of.required' => 'يرجي ملىء خانه الوظيفة المطلوبة',
        ];
    }
}
