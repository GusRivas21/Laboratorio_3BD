<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignedTaskRequest;
use App\Http\Requests\UpdateAssignedTaskRequest;
use App\Models\AssignedTask;
use Illuminate\Http\Request;
use App\Http\Resources\AssignedTaskResource;
use Illuminate\Http\Response;
use Dedoc\Scramble\Attributes\Group;


#[Group('Assigned Tasks')]
class AssignedTaskApiController extends Controller
{
    /**
     * Index
     *
     *Gets the entire list of assigned tasks
     *
     *@response AnonymousResourceCollection<AssignedTaskResource>
     */
    public function index()
    {
        return (AssignedTaskResource::collection(AssignedTask::with('worker', 'crop')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);

    }

    /**
     * Store
     *
     * Create assigned task in the database.
     * @param StoreAssignedTaskRequest $request
     *
     */
    public function store(StoreAssignedTaskRequest $request)
    {
        $assignedTask = AssignedTask::create($request->validated());

        return (new AssignedTaskResource($assignedTask))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show.
     *
     * Displays a task assigned by its id
     *
     * @param AssignedTask $assignedTask The resolved assigned Task instance.
     */
    public function show(AssignedTask $assignedTask)
    {
         return (new AssignedTaskResource($assignedTask))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update
     *
     * Updates the specified assigned task in storage for id.
     * @param UpdateAssignedTaskRequest $request
     */
    public function update(UpdateAssignedTaskRequest $request, AssignedTask $assignedTask)
    {
        $assignedTask->update($request->validated());

        return (new AssignedTaskResource($assignedTask))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Delete
     *
     * Deletes the specified assigned task from storage for id.
     * @param AssignedTask $assignedTask The resolved assigned Task instance.
     *
     */
    public function destroy(AssignedTask $assignedTask)
    {
    {
        $assignedTask->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    }
}
