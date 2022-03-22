<?php

namespace App\Http\Requests\Admin\FollowCarsRequests;

use Illuminate\Foundation\Http\FormRequest;

class FollowCarsStoreRequest extends FormRequest
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
            'car_type' => 'required',
            'plate_number' => 'required',
            'color' => 'required',
            'model' => 'required',
            'owner_name' => 'required',
            'license_expiration' => 'required',
            'insurance_expiry' => 'required',
            'driving_auth_expiry_1' => 'required',
            'driver_name' => 'required'
        ];
    }
}
