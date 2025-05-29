<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCropRequest;
use App\Http\Requests\UpdateCropRequest;
use App\Models\Crop;
use Illuminate\Http\Request;
use App\Http\Resources\CropResource;
use App\Http\Resources\PropertyResource;
use Illuminate\Http\Response;
use Dedoc\Scramble\Attributes\Group;

#[Group('Crop')]

class CropApiController extends Controller
{
    /**
     * Index
     *
     * Gets the entire list of crops
     *
     * @response AnonymousResourceCollection<CropResource>
     */
    public function index()
    {
        return (CropResource::collection(Crop::with('property')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store
     *
     * Create crop in the database.
     * @param StoreCropRequest $request
     */
    public function store(StoreCropRequest $request)
    {
        $crop = Crop::create($request->validated());

        return (new CropResource($crop))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show
     *
     * Displays a crop by its id
     * @param Crop $crop The resolved crop instance.
     */
    public function show(Crop $crop)
    {
         return (new CropResource($crop))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update
     *
     * update the specified resource in storage.
     * @param UpdateCropRequest $request
     */
    public function update(UpdateCropRequest $request, Crop $crop)
    {
        $crop->update($request->validated());

        return (new PropertyResource($crop))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     *Delete
     * Removes the specified crop from storage.
     * @param Crop $crop The resolved crop instance.
     */
    public function destroy(Crop $crop)
    {

        $crop->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
