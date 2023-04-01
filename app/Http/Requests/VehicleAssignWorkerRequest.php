<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class VehicleAssignWorkerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'worker_id' => 'required|integer|exists:workers,id',
            'vehicle_id' => 'required|integer|exists:vehicles,id',
        ];
    }

    public function messages()
    {
        return [
            'worker_id.required' => 'worker_id is required',
            'worker_id.exists' => 'worker_id is not exists',
            'worker_id.integer' => 'worker_id must be integer',
            'vehicle_id.required' => 'vehicle_id is required',
            'vehicle_id.exists' => 'vehicle_id is not exists',
            'vehicle_id.integer' => 'vehicle_id must be integer',
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
