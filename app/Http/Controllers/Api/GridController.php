<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ReadFileTrait;
use App\Http\Repository\GridRepository;

class GridController extends Controller
{
    use ReadFileTrait;
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    function GridRandom(){
        return response()->json([
            'status'  => true,
            'message' => dirname(__FILE__)."/../storage/app/certs",
            'data'    => [],
        ],200);
    }
    function GridPrototype(GridRepository $gridRepository){
    
        $grid_map = $gridRepository->getGridData();
        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $grid_map,
        ],200);
    }
    function GridLoadDesign(Request $request){
        try {
            $grid_map = $this->LoadTxtFile($request);
            
        } catch (\Exception $e) {
     
            return response()->json([
                'status' => false,
                'message' => $e
            ],500);
        }
        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $grid_map,
        ],200);
    }
    function GridLightUp(){
        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => [],
        ],200);
    }
}