<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePredictiveAnalysisRequest;
use App\Http\Requests\UpdatePredictiveAnalysisRequest;
use App\Models\Crop;
use App\Models\PredictiveAnalysis;
use Illuminate\Http\Request;
use App\Http\Resources\PredictiveAnalysisResource;
use Illuminate\Http\Response;
use Dedoc\Scramble\Attributes\Group;

#[Group('Predictive Analysis')]

class PredictiveAnalysisApiController extends Controller
{
    /**
     * Index
     * Gets the entire list of predictive analyses
     * @response AnonymousResourceCollection<PredictiveAnalysisResource>
     */
    public function index()
    {
        return (PredictiveAnalysisResource::collection(PredictiveAnalysis::with('crop')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store
     * Create predictive analysis in the database.
     * @param StorePredictiveAnalysisRequest $request
     *
     */
    public function store(StorePredictiveAnalysisRequest $request)
    {
        $predictiveAnalysis = PredictiveAnalysis::create($request->validated());

        return (new PredictiveAnalysisResource($predictiveAnalysis))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show
     * Displays a predictive analysis by its id
     * @param PredictiveAnalysis $predictiveAnalysis The resolved predictive analysis instance.
     *
     */
    public function show(PredictiveAnalysis $predictiveAnalysis)
    {
         return (new PredictiveAnalysisResource($predictiveAnalysis))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update
     * Update the specified resource in storage.
     * @param UpdatePredictiveAnalysisRequest $request
     * @param PredictiveAnalysis $predictiveAnalysis The resolved predictive analysis instance.
     */
    public function update(UpdatePredictiveAnalysisRequest $request, PredictiveAnalysis $predictiveAnalysis)
    {
        $predictiveAnalysis->update($request->validated());

        return (new PredictiveAnalysisResource($predictiveAnalysis))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Delete
     * Remove the specified resource from storage.
     * @param PredictiveAnalysis $predictiveAnalysis The resolved predictive analysis instance.
     */
    public function destroy(PredictiveAnalysis $predictiveAnalysis)
    {
    {
        $predictiveAnalysis->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    }
}
