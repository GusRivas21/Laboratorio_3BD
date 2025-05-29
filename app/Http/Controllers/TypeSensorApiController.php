<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeSensorRequest;
use App\Http\Requests\UpdateTypeSensorRequest;
use App\Models\TypeSensor;
use Illuminate\Http\Request;
use App\Http\Resources\TypeSensorResource;
use Illuminate\Http\Response;
use Dedoc\Scramble\Attributes\Group;

#[Group('TypeSensor')]

class TypeSensorApiController extends Controller
{
    /**
     * Index
     * Gets the entire list of type sensors
     * @response AnonymousResourceCollection<TypeSensorResource>
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
     * Store
     * Create type sensor in the database.
     * @param StoreTypeSensorRequest $request
     */
    public function store(StoreTypeSensorRequest $request)
    {
        $typeSensor = TypeSensor::query()->create($request->validated());

        return (new TypeSensorResource($typeSensor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show
     * Displays a type sensor by its id
     * @param TypeSensor $typeSensor The resolved type sensor instance.
     *
     */
    public function show(TypeSensor $typeSensor)
    {
         return (new TypeSensorResource($typeSensor))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update
     * Update the specified resource in storage.
     * @param UpdateTypeSensorRequest $request
     * @param TypeSensor $typeSensor The resolved type sensor instance.
     */
    public function update(UpdateTypeSensorRequest $request, TypeSensor $typeSensor)
    {
        $typeSensor->update($request->validated());

        return (new TypeSensorResource($typeSensor))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Delete
     * Remove the specified resource from storage.
     * @param TypeSensor $typeSensor The resolved type sensor instance.
     * 
     */
    public function destroy(TypeSensor $typeSensor)
    {
        $typeSensor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
