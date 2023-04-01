<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleAssignWorkerRequest;
use App\Http\Requests\VehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Imports\VehiclesImport;
use App\Models\Vehicle;
use Maatwebsite\Excel\Facades\Excel;
class VehicleController extends Controller
{

    public function import()
    {
        Excel::import(new VehiclesImport, storage_path('/imports/vehicles.csv'));

        return true;
    }

    public function index()
    {
        return VehicleResource::collection(Vehicle::all());
    }

    public function show(Vehicle $vehicle)
    {
        return response()->json(new VehicleResource($vehicle));
    }

    public function store(VehicleRequest $request)
    {
        $vehicle = Vehicle::query()->create($request->all());
        return response()->json(new VehicleResource($vehicle));
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        return response()->json(new VehicleResource($vehicle));
    }

    public function vehicleAssignWorker(VehicleAssignWorkerRequest $request)
    {
        $vehicle = Vehicle::find($request->vehicle_id);
        $vehicle->worker_id = $request->worker_id;
        $vehicle->save();
        return response()->json(new VehicleResource($vehicle));
    }
}
