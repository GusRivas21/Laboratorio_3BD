<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignedTaskRequest;
use App\Http\Requests\UpdateAssignedTaskRequest;
use App\Models\AssignedTask;
use Illuminate\Http\Request;
use App\Http\Resources\AssignedTaskResource;
use Illuminate\Http\Response;

class AssignedTaskApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (AssignedTaskResource::collection(AssignedTask::with('worker', 'crop')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssignedTaskRequest $request)
    {
        $assignedTask = AssignedTask::create($request->validated());

        return (new AssignedTaskResource($assignedTask))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(AssignedTask $assignedTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssignedTaskRequest $request, AssignedTask $assignedTask)
    {
        $assignedTask->update($request->validated());

        return (new AssignedTaskResource($assignedTask))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignedTask $assignedTask)
    {
    {
        $assignedTask->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    }
}
