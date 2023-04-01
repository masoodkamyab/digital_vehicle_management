<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class VehicleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:vehicles',
            'date_acquired' => 'required',
            'parking_location' => 'required',
            'license_plate_number' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name cannot be blank',
            'name.unique' => 'name is not unique',
            'date_acquired.required' => 'date_acquired cannot be blank',
            'parking_location.required' => 'parking_location cannot be blank',
            'license_plate_number.required' => 'license_plate_number cannot be blank',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));

    }
}
