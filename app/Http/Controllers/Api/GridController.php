<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\GridService;
use App\Services\ResolveService;
use App\Traits\ReadFileTrait;
use Illuminate\Support\Arr;


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

    public function __construct(
        GridService $dta,
        ResolveService $resolve
        ){
            $this->dta = $dta;
            $this->resolve = $resolve;
        }   

    function gridRandom(): JsonResponse {

        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $this->dta->getGrid(false)
        ],200);
    }
    function gridPrototype(): JsonResponse {

        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $this->dta->getGrid(true),
        ],200);
    }
    function gridLoadTxt(Request $request): JsonResponse {

        try {
            //recibo y proceso data
            $matrix = $this->dta->processData($request->all());

        } catch (\Exception $e) {
     
            return response()->json([
                'status' => false,
                'message' => $e
            ],500);
        }
        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $matrix,
        ],200);
    }
    function gridLightUp(Request $request): JsonResponse {
       
        try {
            //recibo y proceso data
            $matrix=$request->all();

        } catch (\Exception $e) {
     
            return response()->json([
                'status' => false,
                'message' => $e
            ],500);
        }

        $resolve = $this->resolve->gridSolution();
        $resolveStatic = $this->dta->getGridSolved($matrix);

        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $resolve
        ],200);
    }

    function formatMatrixResolveToGrid(Request $request): JsonResponse {
       
        try {
            //recibo y proceso data
            $matrix=$request->all();

        } catch (\Exception $e) {
     
            return response()->json([
                'status' => false,
                'message' => $e
            ],500);
        }
        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $this->dta->formatMatrixResolveToGrid($matrix)
        ],200);
    }

}