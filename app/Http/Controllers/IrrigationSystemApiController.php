<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIrrigationSystemRequest;
use App\Http\Requests\UpdateIrrigationSystemRequest;
use App\Models\IrrigationSystem;
use Illuminate\Http\Request;
use App\Http\Resources\IrrigationSystemResource;
use Illuminate\Http\Response;

class IrrigationSystemApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (IrrigationSystemResource::collection(IrrigationSystem::with('crop', 'sensor')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIrrigationSystemRequest $request)
    {
        $irrigationSystem = IrrigationSystem::query()->create($request->validated());

        return (new IrrigationSystemResource($irrigationSystem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(IrrigationSystem $irrigationSystem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIrrigationSystemRequest $request, IrrigationSystem $irrigationSystem)
    {
        $irrigationSystem->update($request->validated());

        return (new IrrigationSystemResource($irrigationSystem))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IrrigationSystem $irrigationSystem)
    {
    {
        $irrigationSystem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    }
}
