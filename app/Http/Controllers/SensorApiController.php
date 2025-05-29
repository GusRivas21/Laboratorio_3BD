<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSensorRequest;
use App\Http\Requests\UpdateSensorRequest;
use App\Models\Sensor;
use Illuminate\Http\Request;
use App\Http\Resources\SensorResource;
use Illuminate\Http\Response;
use Dedoc\Scramble\Attributes\Group;

#[Group('Sessors')]

class SensorApiController extends Controller
{
    /**
     * Index
     * Gets the entire list of sensors
     * @response AnonymousResourceCollection<SensorResource>
     */
    public function index()
    {
        return (SensorResource::collection(Sensor::with('property', 'typeSensor')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store
     * Create sensor in the database.
     * @param StoreSensorRequest $request
     */
    public function store(StoreSensorRequest $request)
    {
        $sensor = Sensor::create($request->validated());

        return (new SensorResource($sensor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show
     * Displays a sensor by its id
     * @param Sensor $sensor The resolved sensor instance.
     *
     */
    public function show(Sensor $sensor)
    {
         return (new SensorResource($sensor))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update
     * Update the specified resource in storage.
     * @param UpdateSensorRequest $request
     * @param Sensor $sensor The resolved sensor instance.
     */
    public function update(UpdateSensorRequest $request, Sensor $sensor)
    {
        $sensor->update($request->validated());

        return (new SensorResource($sensor))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Delete
     * Delete the specified resource from storage.
     * @param Sensor $sensor The resolved sensor instance.
     */
    public function destroy(Sensor $sensor)
    {
        $sensor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
