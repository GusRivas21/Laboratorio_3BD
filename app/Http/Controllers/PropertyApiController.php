<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Resources\PropertyResource;
use Illuminate\Http\Response;
use Dedoc\Scramble\Attributes\Group;

#[Group('Property')]
class PropertyApiController extends Controller
{
    /**
     * Index
     *
     * Gets the entire list of properties
     * @response AnonymousResourceCollection<PropertyResource>
     */
    public function index()
    {
        return (PropertyResource::collection(Property::with('farmer')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store
     *
     * Create property in the database.
     * @param StorePropertyRequest $request
     *
     */
    public function store(StorePropertyRequest $request)
    {
        $property = Property::create($request->validated());

        return (new PropertyResource($property))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show
     *
     * Displays a property by its id
     * @param Property $property The resolved property instance.
     */
    public function show(Property $property)
    {
         return (new PropertyResource($property))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update
     *
     * Update the specified resource in storage.
     * @param UpdatePropertyRequest $request
     * @param Property $property The resolved property instance.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update($request->validated());

        return (new PropertyResource($property))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Delete
     * 
     * Remove the specified resource from storage.
     * @param Property $property The resolved property instance.
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
