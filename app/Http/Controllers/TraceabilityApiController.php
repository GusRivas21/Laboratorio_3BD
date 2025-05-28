<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTraceabilityRequest;
use App\Http\Requests\UpdateTraceabilityRequest;
use App\Models\Traceability;
use Illuminate\Http\Request;
use App\Http\Resources\TraceabilityResource;
use Illuminate\Http\Response;

class TraceabilityApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (TraceabilityResource::collection(Traceability::with('property')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTraceabilityRequest $request)
    {
        $traceability = Traceability::create($request->validated());

        return (new TraceabilityResource($traceability))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Traceability $traceability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTraceabilityRequest $request, Traceability $traceability)
    {
        $traceability->update($request->validated());

        return (new TraceabilityResource($traceability))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Traceability $traceability)
    {
        $traceability->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
