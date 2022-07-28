<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ReadFileTrait;

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
            'message' => 'success',
            'data'    => [],
        ],200);
    }
    function GridPrototype(){
        $grid = [
            [0,0,0,1,0,1,1,1],
            [0,1,0,0,0,0,0,0],
            [0,1,0,0,0,1,1,1],
            [0,1,1,1,1,0,0,0],
            [0,1,0,0,0,0,0,0]
        ];
        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $grid,
        ],200);
    }
    function GridLoadDesign(){
        try {
            //$room_map = $this->ReadTxt($request);
            $loadFile = json_decode(file_get_contents(public_path(). "/matrix.txt"), true);

        } catch (\Exception $e) {
     
            return response()->json([
                'status' => false,
                'message' => $e
            ],500);
        }
        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $loadFile,
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