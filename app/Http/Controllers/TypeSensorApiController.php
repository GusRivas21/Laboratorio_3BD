<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeSensorRequest;
use App\Models\TypeSensor;
use Illuminate\Http\Request;
use App\Http\Resources\TypeSensorResource;
use Illuminate\Http\Response;

class TypeSensorApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (TypeSensorResource::collection(TypeSensor::all()))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeSensorRequest $request)
    {
        $typeSensor = TypeSensor::create($request->validated());

        return (new TypeSensorResource($typeSensor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeSensor $typeSensor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeSensor $typeSensor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeSensor $typeSensor)
    {
        //
    }
}
