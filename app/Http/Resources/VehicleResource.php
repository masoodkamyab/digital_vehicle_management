<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date_acquired' => $this->date_acquired,
            'parking_location' => $this->parking_location,
            'license_plate_number' => $this->license_plate_number,
            'worker_name' => $this->worker?->name,
            'worker_id' => $this->worker?->id,
            'inspections' => $this->inspections,
        ];
    }
}
