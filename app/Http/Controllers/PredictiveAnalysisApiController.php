<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePredictiveAnalysisRequest;
use App\Models\Crop;
use App\Models\PredictiveAnalysis;
use Illuminate\Http\Request;
use App\Http\Resources\PredictiveAnalysisResource;
use Illuminate\Http\Response;

class PredictiveAnalysisApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (PredictiveAnalysisResource::collection(PredictiveAnalysis::with('crop')->paginate(4)))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePredictiveAnalysisRequest $request)
    {
        $predictiveAnalysis = PredictiveAnalysis::create($request->validated());

        return (new PredictiveAnalysisResource($predictiveAnalysis))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(PredictiveAnalysis $predictiveAnalysis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PredictiveAnalysis $predictiveAnalysis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PredictiveAnalysis $predictiveAnalysis)
    {
        //
    }
}
