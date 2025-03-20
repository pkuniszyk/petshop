<?php

use App\Http\Controllers\Api\PetController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/test-auth', function () {
    return response()->json(['message' => 'Authenticated!']);
});

/* Route::get('/test-auth', function () {
    return response()->json(['message' => 'It works!']);
}); */

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pets', [PetController::class, 'index']);
    Route::post('/pets', [PetController::class, 'store']);
    Route::get('/pets/{id}', [PetController::class, 'show']);
    Route::put('/pets/{id}', [PetController::class, 'update']);
    Route::delete('/pets/{id}', [PetController::class, 'destroy']);
});
