<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFarmerRequest;
use App\Http\Requests\UpdateFarmerRequest;
use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Resources\FarmerResource;
use Illuminate\Http\Response;

class FarmerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $farmers = FarmerResource::collection(Farmer::all());

        return response()->json([
            'farmers' => $farmers
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFarmerRequest $request)
    {
        $farmer = Farmer::query()->create($request->validated());

        return (new FarmerResource($farmer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Farmer $farmer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFarmerRequest $request, Farmer $farmer)
    {
        $farmer->update($request->validated());

        return (new FarmerResource($farmer))
            ->response()
            ->setStatusCode(Response::HTTP_OK);        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farmer $farmer)
    {
            {
        $farmer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    }
}
