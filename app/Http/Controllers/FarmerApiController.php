<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFarmerRequest;
use App\Http\Requests\UpdateFarmerRequest;
use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Resources\FarmerResource;
use Illuminate\Http\Response;
use Dedoc\Scramble\Attributes\Group;

#[Group('Farmer')]

class FarmerApiController extends Controller
{
    /**
     * Index
     *
     * Gets the entire list of farmers
     * @response AnonymousResourceCollection<FarmerResource>
     */
    public function index()
    {
       $farmers = FarmerResource::collection(Farmer::query()->paginate(4));

        return response()->json([
            'farmers' => $farmers
        ]);
    }

    /**
     * Store
     *
     * Create farmer in the database.
     * @param StoreFarmerRequest $request
     */
    public function store(StoreFarmerRequest $request)
    {
        $farmer = Farmer::query()->create($request->validated());

        return (new FarmerResource($farmer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show
     *
     * Displays a farmer by its id
     * @param Farmer $farmer The resolved farmer instance.
     *
     */
    public function show(Farmer $farmer)
    {
         return (new FarmerResource($farmer))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update
     *
     * Update the specified resource in storage.
     * @param UpdateFarmerRequest $request
     * @param Farmer $farmer The resolved farmer instance.
     */
    public function update(UpdateFarmerRequest $request, Farmer $farmer)
    {
        $farmer->update($request->validated());

        return (new FarmerResource($farmer))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Delete
     * 
     * Remove the specified resource from storage.
     * @param Farmer $farmer The resolved farmer instance.
     */
    public function destroy(Farmer $farmer)
    {

        $farmer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
