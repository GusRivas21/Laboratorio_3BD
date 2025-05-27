<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerRequest;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Http\Resources\WorkerResource;
use Illuminate\Http\Response;

class WorkerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (WorkerResource::collection(Worker::all()))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerRequest $request)
    {
        $worker = Worker::query()->create($request->validated());

        return (new WorkerResource($worker))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worker $worker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        //
    }
}
