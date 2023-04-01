<?php

namespace App\Imports;

use App\Models\Vehicle;
use App\Models\Worker;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class VehiclesImport implements ToModel, WithStartRow
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
        $worker = Worker::where('name', $row[0])->first();
        if (isset($worker)) {
            $row[0] = $worker->id;
        } elseif ($row[0] != null) {
            $new_worker = new Worker();
            $new_worker->name = $row[0];
            $new_worker->save();
            $row[0] = $new_worker->id;
        }

        return new Vehicle([
            'name' => $row[1],
            'date_acquired' => $row[2],
            'parking_location' => $row[3],
            'license_plate_number' => $row[4],
            'worker_id' => $row[0],
        ]);
    }
}
