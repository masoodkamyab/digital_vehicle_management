<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleAssignWorkerRequest;
use App\Http\Requests\VehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VehicleResource::collection(Vehicle::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request)
    {
        $vehicle = Vehicle::query()->create($request->all());
        return response()->json(new VehicleResource($vehicle));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        return response()->json(new VehicleResource($vehicle));
    }

    /**
     * Patch the specified resource in storage.
     */
    public function vehicleAssignWorker(VehicleAssignWorkerRequest $request)
    {
        $vehicle = Vehicle::find($request->vehicle_id);
        $vehicle->worker_id = $request->worker_id;
        $vehicle->save();
        return response()->json(new VehicleResource($vehicle));
    }
}
