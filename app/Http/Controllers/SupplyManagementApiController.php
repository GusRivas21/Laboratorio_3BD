<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplyManagementRequest;
use App\Http\Requests\UpdateSupplyManagementRequest;
use App\Models\SupplyManagement;
use Illuminate\Http\Request;
use App\Http\Resources\SupplyManagementResource;
use Illuminate\Http\Response;

class SupplyManagementApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (SupplyManagementResource::collection(SupplyManagement::with('crop')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplyManagementRequest $request)
    {
        $supplyManagement = SupplyManagement::create($request->validated());

        return (new SupplyManagementResource($supplyManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(SupplyManagement $supplyManagement)
    {
         return (new SupplyManagementResource($supplyManagement))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplyManagementRequest $request, SupplyManagement $supplyManagement)
    {
        $supplyManagement->update($request->validated());

        return (new SupplyManagementResource($supplyManagement))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupplyManagement $supplyManagement)
    {
    {
        $supplyManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    }
}
