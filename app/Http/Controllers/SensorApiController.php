<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSensorRequest;
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
        return (SensorResource::collection(Sensor::with('property', '')->paginate(4)))
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sensor $sensor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sensor $sensor)
    {
        //
    }
}
