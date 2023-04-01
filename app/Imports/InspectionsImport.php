<?php

namespace App\Imports;

use App\Models\Inspection;
use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class InspectionsImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $vehicle = Vehicle::where('name', $row[0])->first();
        if (!isset($vehicle))
            abort(404);

        return new Inspection([
            'vehicle_id' => $vehicle->id,
            'type' => $row[1],
            'date' => $row[2],
        ]);
    }
}
