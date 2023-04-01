<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkerRequest;
use App\Http\Resources\WorkerResource;
use App\Models\Worker;

class WorkerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/vehicle-management/api/workers",
     *     summary="Retrieve a list of all workers",
     *     description="Returns a list of all workers in the database",
     *     operationId="index",
     *     tags={"Workers"},
     *     @OA\Response(
     *         response=200,
     *         description="List of workers",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/WorkerResource")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return WorkerResource::collection(Worker::all());
    }

    /**
     * @OA\Get(
     *     path="/vehicle-management/api/workers/{worker_id}",
     *     operationId="getWorkerById",
     *     summary="Get a worker by ID",
     *     tags={"Workers"},
     *     @OA\Parameter(
     *         name="worker_id",
     *         in="path",
     *         description="ID of the worker",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             ref="#/components/schemas/WorkerResource"
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found"
     *     )
     * )
     */
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
