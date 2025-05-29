<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeSensorRequest;
use App\Http\Requests\UpdateTypeSensorRequest;
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
       $typeSensor = TypeSensorResource::collection(TypeSensor::query()->paginate(4))
            ->response()
            ->getData(true);

        return response()->json([
            'typeSensors' => $typeSensor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeSensorRequest $request)
    {
        $typeSensor = TypeSensor::query()->create($request->validated());

        return (new TypeSensorResource($typeSensor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeSensor $typeSensor)
    {
         return (new TypeSensorResource($typeSensor))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeSensorRequest $request, TypeSensor $typeSensor)
    {
        $typeSensor->update($request->validated());

        return (new TypeSensorResource($typeSensor))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeSensor $typeSensor)
    {
        $typeSensor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
