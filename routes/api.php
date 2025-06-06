<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmerApiController;
use App\Http\Controllers\PropertyApiController;
use App\Http\Controllers\CropApiController;
use App\Http\Controllers\PredictiveAnalysisApiController;
use App\Http\Controllers\TraceabilityApiController;
use App\Http\Controllers\IrrigationSystemApiController;
use App\Http\Controllers\TypeSensorApiController;
use App\Http\Controllers\SensorApiController;
use App\Http\Controllers\SupplyManagementApiController;
use App\Http\Controllers\WorkerApiController;
use App\Http\Controllers\AssignedTaskApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('farmers', FarmerApiController::class);
Route::apiResource('properties', PropertyApiController::class);
Route::apiResource('crops', CropApiController::class);
Route::apiResource('traceabilities', TraceabilityApiController::class);
Route::apiResource('irrigationSystems', IrrigationSystemApiController::class);
Route::apiResource('typeSensors', TypeSensorApiController::class);
Route::apiResource('sensors', SensorApiController::class);
Route::apiResource('predictiveAnalyses', PredictiveAnalysisApiController::class);
Route::apiResource('supplyManagements', SupplyManagementApiController::class);
Route::apiResource('workers', WorkerApiController::class);
Route::apiResource('assignedTasks', AssignedTaskApiController::class);

