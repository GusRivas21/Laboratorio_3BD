<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTraceabilityRequest;
use App\Http\Requests\UpdateTraceabilityRequest;
use App\Models\Traceability;
use Illuminate\Http\Request;
use App\Http\Resources\TraceabilityResource;
use Illuminate\Http\Response;
use Dedoc\Scramble\Attributes\Group;

#[Group('Traceability')]

class TraceabilityApiController extends Controller
{
    /**
     * Index
     *
     * Gets the entire list of traceabilities
     * @response AnonymousResourceCollection<TraceabilityResource>
     */
    public function index()
    {
        return (TraceabilityResource::collection(Traceability::with('crop')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store
     *
     * Create traceability in the database.
     * @param StoreTraceabilityRequest $request
     */
    public function store(StoreTraceabilityRequest $request)
    {
        $traceability = Traceability::create($request->validated());

        return (new TraceabilityResource($traceability))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show
     *
     * Displays a traceability by its id
     * @param Traceability $traceability The resolved traceability instance.
     */
    public function show(Traceability $traceability)
    {
         return (new TraceabilityResource($traceability))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update
     *
     * Update the specified resource in storage.
     * @param UpdateTraceabilityRequest $request
     * @param Traceability $traceability The resolved traceability instance.
     */
    public function update(UpdateTraceabilityRequest $request, Traceability $traceability)
    {
        $traceability->update($request->validated());

        return (new TraceabilityResource($traceability))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Delete
     * 
     * Delete the specified resource from storage.
     * @param Traceability $traceability The resolved traceability instance.
     */
    public function destroy(Traceability $traceability)
    {
        $traceability->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
