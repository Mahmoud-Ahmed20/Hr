<?php

namespace App\Http\Requests\Admin\Business_trip_and_transfer_requestsRequests;

use Illuminate\Foundation\Http\FormRequest;

class business_trip_and_transfer_requestsRequests extends FormRequest
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
            'id_no' => 'required',
//            'Travel_Residence_details_from.*' => 'required',
//            'job_id' => 'required',
//            'staff_id' => 'required',
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
            'id_no.required' => 'يرجي ملىء خانه الرقم الوظيفي',
            'name.required' => 'يرجي ملىء خانه الاسم',
//            'Travel_Residence_details_from.required' => 'يرجي ملىء خانه تفاصيل السفر والاقامة',
//            'job_id.required' => 'يرجي ملىء خانه الوظيفه',
//            'staff_id.required' => 'يرجي ملىء خانه اسم الموظف',
//            'birth.required' => 'يرجي ملىء خانه تاريخ الميلاد Date of birth	',
//            'place_of_birth.required' => 'يرجي ملىء خانه مكان الميلاد Place of birth	',
//            'nationality.required' => 'يرجي ملىء خانه الجنسية Nationality',
//            'religion.required' => 'يرجي ملىء خانه  الديانة Religion',
            //            'position_applied_of.required' => 'يرجي ملىء خانه الوظيفة المطلوبة',
        ];
    }
}
