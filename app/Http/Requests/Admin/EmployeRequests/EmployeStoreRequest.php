<?php

namespace App\Http\Requests\Admin\EmployeRequests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeStoreRequest extends FormRequest
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
//            'email' => 'required|unique:admins,email',
            'father_name' => 'required',
            'first_name' => 'required',
            'grandfather_name' => 'required',
            'family_name' => 'required',
//            'phone' => 'required|unique:admins,phone',
            'position_applied_of' => 'required',
            'religion' => 'required',
            'nationality' => 'required',
            'place_of_birth' => 'required',
            'birth' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'position_applied_of.required' => 'يرجي ملىء خانه الوظيفة المطلوبة',
            'first_name.required' => 'يرجي ملىء خانه الاسم الاول First Name',
            'father_name.required' => 'يرجي ملىء خانه اسم الاب Fathers Name',
            'grandfather_name.required' => 'يرجي ملىء خانه اسم الجد Grand fathers',
            'family_name.required' => 'يرجي ملىء خانه اسم العائلة Family Name',
            'birth.required' => 'يرجي ملىء خانه تاريخ الميلاد Date of birth	',
            'place_of_birth.required' => 'يرجي ملىء خانه مكان الميلاد Place of birth	',
            'nationality.required' => 'يرجي ملىء خانه الجنسية Nationality',
            'religion.required' => 'يرجي ملىء خانه  الديانة Religion',
        ];
    }
}
