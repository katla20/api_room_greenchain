<?php

use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\GridController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::group(['middleware'=>'auth:sanctum','prefix' => 'grid'], function(){

    Route::get('random', [GridController::class, 'GridRandom']);
    Route::get('prototype', [GridController::class, 'GridPrototype']);
    Route::get('load_design', [GridController::class, 'GridLoadDesign']);
    Route::get('light_up', [GridController::class, 'GridLightUp']);

});