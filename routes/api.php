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

Route::get('test', function(){

    return response()->json([
        'status'  => true,
        'message' => 'success',
        'data'    => ['url'=>str_replace('\\', '/', dirname(__FILE__)).'/storage/app/certs'],
    ],200);
});

//Route::group(['middleware'=>'auth:sanctum','prefix' => 'grid'], function(){
Route::group(['prefix' => 'grid'], function(){

    Route::get('random', [GridController::class, 'gridRandom']);
    Route::get('prototype', [GridController::class, 'gridPrototype']);
    Route::post('load_txt', [GridController::class, 'gridLoadTxt']);
    Route::post('light_up', [GridController::class, 'gridLightUp']);
    Route::post('format_togrid', [GridController::class, 'formatMatrixResolveToGrid']);
    
});