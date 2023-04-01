<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class InspectionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => 'required|string|in:General Inspection,Maintenance,Technical Supervisory Association inspection',
            'date' => 'required|date',
            'vehicle_id' => 'required|integer|exists:vehicles,id',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'type is required',
            'type.string' => 'type must be string',
            'type.in' => 'type must be one of these values: [General Inspection,Maintenance,Technical Supervisory Association inspection]',
            'date.required' => 'date is required',
            'date.date' => 'date must be date format like this: yyyy-mm-dd',
            'vehicle_id.required' => 'vehicle_id is required',
            'vehicle_id.integer' => 'vehicle_id must be integer',
            'vehicle_id.exists' => 'vehicle_id not found',
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
