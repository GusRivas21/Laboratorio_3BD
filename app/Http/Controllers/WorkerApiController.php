<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Http\Resources\WorkerResource;
use Illuminate\Http\Response;
use Dedoc\Scramble\Attributes\Group;

#[Group('Worker')]

class WorkerApiController extends Controller
{
    /**
     * Index
     * Gets the entire list of workers
     * @response AnonymousResourceCollection<WorkerResource>
     */
    public function index()
    {
        return (WorkerResource::collection(Worker::query()->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store
     * Create worker in the database.
     * @param StoreWorkerRequest $request
     */
    public function store(StoreWorkerRequest $request)
    {
        $worker = Worker::query()->create($request->validated());

        return (new WorkerResource($worker))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    /**
     * Show
     * Displays a worker by its id
     * @param Worker $worker The resolved worker instance.
     */
    public function show(Worker $worker)
    {
        return (new WorkerResource($worker))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update
     * Update the specified resource in storage.
     * @param UpdateWorkerRequest $request
     * @param Worker $worker The resolved worker instance.
     */
    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        $worker->update($request->validated());

        return (new WorkerResource($worker))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Delete
     * Delete the specified resource from storage.
     * @param Worker $worker The resolved worker instance.
     */
    public function destroy(Worker $worker)
    {
    {
        $worker->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    }
}
