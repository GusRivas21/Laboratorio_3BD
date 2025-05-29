<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCropRequest;
use App\Http\Requests\UpdateCropRequest;
use App\Models\Crop;
use Illuminate\Http\Request;
use App\Http\Resources\CropResource;
use App\Http\Resources\PropertyResource;
use Illuminate\Http\Response;

class CropApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (CropResource::collection(Crop::with('property')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCropRequest $request)
    {
        $crop = Crop::create($request->validated());

        return (new CropResource($crop))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Crop $crop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCropRequest $request, Crop $crop)
    {
        $crop->update($request->validated());

        return (new PropertyResource($crop))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crop $crop)
    {
    {
        $crop->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    }
}
