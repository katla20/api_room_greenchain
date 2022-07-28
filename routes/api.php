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
Route::get('/get', function () {
   return 'yes';
});

Route::post('login', [AuthController::class, 'login']);

Route::get('show_', [RoomController::class, 'index']);
Route::get('read_', [RoomController::class, 'ReadTxt']);

Route::group(['middleware'=>'auth:sanctum','prefix' => 'grid'], function(){
    /*endpoint grid*/
    Route::get('random', [GridController::class, 'GridRandom']);
    Route::get('prototype', [GridController::class, 'GridPrototype']);
    Route::get('load_design', [GridController::class, 'GridLoadDesign']);
    Route::get('light_up', [GridController::class, 'GridLightUp']);

   /* Route::get('/user_data', function (Request $request) {
        return $request->user();
    });*/
    
});