<?php

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')
      ->prefix('projects')
      ->group(function(){
        Route::get('/',[ProjectController::class, 'index']);
        Route::get('/details/{slug}', [ProjectController::class, 'show']);
      });

Route::post('/contacts', [LeadController::class, 'store']);
