<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    /**
     * @OA\Schema(
     *     schema="WorkerResource",
     *     type="object",
     *     @OA\Property(
     *         property="id",
     *         description="The ID of the worker",
     *         type="integer",
     *         example=1
     *     ),
     *     @OA\Property(
     *         property="name",
     *         description="The name of the worker",
     *         type="string",
     *         example="John Doe"
     *     ),
     *     @OA\Property(
     *         property="vehicles",
     *         description="An array of the worker's vehicles",
     *         type="array",
     *         @OA\Items(
     *             type="object",
     *             @OA\Property(
     *                 property="id",
     *                 description="The ID of the vehicle",
     *                 type="integer",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="name",
     *                 description="The name of the vehicle",
     *                 type="string",
     *                 example="Toyota"
     *             )
     *         )
     *     )
     * )
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'vehicles' => $this->vehicles
        ];
    }
}
