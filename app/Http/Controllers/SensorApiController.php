<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSensorRequest;
use App\Http\Requests\UpdateSensorRequest;
use App\Models\Sensor;
use Illuminate\Http\Request;
use App\Http\Resources\SensorResource;
use Illuminate\Http\Response;

class SensorApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (SensorResource::collection(Sensor::with('property', 'typeSensor')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSensorRequest $request)
    {
        $sensor = Sensor::create($request->validated());

        return (new SensorResource($sensor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sensor $sensor)
    {
         return (new SensorResource($sensor))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSensorRequest $request, Sensor $sensor)
    {
        $sensor->update($request->validated());

        return (new SensorResource($sensor))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sensor $sensor)
    {
        $sensor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
