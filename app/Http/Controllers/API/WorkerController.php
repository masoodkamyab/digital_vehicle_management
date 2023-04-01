<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkerRequest;
use App\Http\Resources\WorkerResource;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function index()
    {
        return WorkerResource::collection(Worker::all());
    }

    public function show(Worker $worker)
    {
        return response()->json(new WorkerResource($worker));
    }

    public function store(WorkerRequest $request)
    {
        $worker = Worker::query()->create($request->all());
        return response()->json(new WorkerResource($worker));
    }

    public function update(WorkerRequest $request, string $id)
    {
        $worker = Worker::findOrFail($id);
        $worker->name = $request->name;
        $worker->save();
        return response()->json(new WorkerResource($worker));
    }

}
