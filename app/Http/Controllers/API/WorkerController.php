<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkerRequest;
use App\Http\Resources\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return WorkerResource::collection(Worker::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkerRequest $request)
    {
        $worker = Worker::query()->create($request->all());
        return response()->json(new WorkerResource($worker));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkerRequest $request, string $id)
    {
        $worker = Worker::findOrFail($id);
        $worker->name = $request->name;
        $worker->save();
        return response()->json(new WorkerResource($worker));
    }

}
