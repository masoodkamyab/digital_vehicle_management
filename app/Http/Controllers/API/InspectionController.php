<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\InspectionRequest;
use App\Http\Resources\InspectionResource;
use App\Imports\InspectionsImport;
use App\Models\Inspection;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InspectionController extends Controller
{
    public function import()
    {
        Excel::import(new InspectionsImport, storage_path('/imports/inspections.csv'));

        return true;
    }

    public function index()
    {
        return InspectionResource::collection(Inspection::all());
    }

    public function show(Inspection $inspection)
    {
        return response()->json(new InspectionResource($inspection));
    }

    public function store(InspectionRequest $request)
    {
        $inspection = Inspection::create($request->only('type', 'date', 'vehicle_id'));
        return response()->json(new InspectionResource($inspection));
    }

    public function update(Request $request, InspectionRequest $inspection)
    {
        $inspection = Inspection::query()->update($request->all());
        return response()->json($inspection);
    }

    public function destroy(InspectionRequest $inspection)
    {
        $inspection->delete();
        return response()->json('this inspection has deleted.');
    }
}
