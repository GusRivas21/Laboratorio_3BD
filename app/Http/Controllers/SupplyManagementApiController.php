<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplyManagementRequest;
use App\Http\Requests\UpdateSupplyManagementRequest;
use App\Models\SupplyManagement;
use Illuminate\Http\Request;
use App\Http\Resources\SupplyManagementResource;
use Illuminate\Http\Response;
use Dedoc\Scramble\Attributes\Group;

#[Group('Supply Management')]
class SupplyManagementApiController extends Controller
{
    /**
     * Index
     *
     * Gets the entire list of supply management records
     * @response AnonymousResourceCollection<SupplyManagementResource>
     */
    public function index()
    {
        return (SupplyManagementResource::collection(SupplyManagement::with('crop')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store
     *
     * Create supply management record in the database.
     * @param StoreSupplyManagementRequest $request
     */
    public function store(StoreSupplyManagementRequest $request)
    {
        $supplyManagement = SupplyManagement::create($request->validated());

        return (new SupplyManagementResource($supplyManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show
     *
     * Displays a supply management record by its id
     * @param SupplyManagement $supplyManagement The resolved supply management instance.
     */
    public function show(SupplyManagement $supplyManagement)
    {
         return (new SupplyManagementResource($supplyManagement))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update
     *
     * Update the specified resource in storage.
     * @param UpdateSupplyManagementRequest $request
     * @param SupplyManagement $supplyManagement The resolved supply management instance.
     */
    public function update(UpdateSupplyManagementRequest $request, SupplyManagement $supplyManagement)
    {
        $supplyManagement->update($request->validated());

        return (new SupplyManagementResource($supplyManagement))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Delete
     * 
     * Delete the specified resource from storage.
     * @param SupplyManagement $supplyManagement The resolved supply management instance.
     */
    public function destroy(SupplyManagement $supplyManagement)
    {
    {
        $supplyManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    }
}
