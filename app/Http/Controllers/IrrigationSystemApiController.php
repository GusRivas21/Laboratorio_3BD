<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIrrigationSystemRequest;
use App\Http\Requests\UpdateIrrigationSystemRequest;
use App\Models\IrrigationSystem;
use Illuminate\Http\Request;
use App\Http\Resources\IrrigationSystemResource;
use Illuminate\Http\Response;
use Dedoc\Scramble\Attributes\Group;

#[Group('Irrigation System')]

class IrrigationSystemApiController extends Controller
{
    /**
     * Index
     *
     * Gets the entire list of irrigation systems
     * @response AnonymousResourceCollection<IrrigationSystemResource>
     */
    public function index()
    {
        return (IrrigationSystemResource::collection(IrrigationSystem::with('crop', 'sensor')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store
     *
     * Create irrigation system in the database.
     * @param StoreIrrigationSystemRequest $request
     */
    public function store(StoreIrrigationSystemRequest $request)
    {
        $irrigationSystem = IrrigationSystem::query()->create($request->validated());

        return (new IrrigationSystemResource($irrigationSystem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show
     *
     * Displays an irrigation system by its id
     * @param IrrigationSystem $irrigationSystem The resolved irrigation system instance.
     */
    public function show(IrrigationSystem $irrigationSystem)
    {
         return (new IrrigationSystemResource($irrigationSystem))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update
     *
     * Update the specified resource in storage.
     * @param UpdateIrrigationSystemRequest $request
     * @param IrrigationSystem $irrigationSystem The resolved irrigation system instance.
     */
    public function update(UpdateIrrigationSystemRequest $request, IrrigationSystem $irrigationSystem)
    {
        $irrigationSystem->update($request->validated());

        return (new IrrigationSystemResource($irrigationSystem))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     *  Delete
     *
     * Deletes the specified irrigation system from storage.
     * @param IrrigationSystem $irrigationSystem The resolved irrigation system instance.
     */
    public function destroy(IrrigationSystem $irrigationSystem)
    {
    {
        $irrigationSystem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    }
}
