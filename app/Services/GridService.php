<?php

namespace App\Services;

use App\Models\Grid;
use App\Services\DtaService;
use App\Services\ResolveService;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class GridService extends Grid implements GridInterface
{
    public function __construct(
        DtaService $dta,
		ResolveService $rlve,
		)
    {
        $this->dta = $dta;
		$this->rlve = $rlve;
		
    }
    
    public function getGrid(bool $default): array
    {
        $matrix = $this->dta->getMatrix($default);
        return [
            'grid'=> $this->dta->mapGrid($matrix),
            'matrix' => $matrix
        ];
    }

    public function processData(array $matrix): array
    {
        return [
            'grid'=> $this->dta->mapGrid($matrix),
            'matrix' => $matrix
        ];
    }

    public function getGridSolved(array $matrix): array
    {
		$grid = $this->rlve->gridSolution();
		//$grid = $this->dta->mapGridSolved($matrix);
        return [
            'grid'=> $grid,
            'matrix' => $matrix
        ];
    }

    public function formatMatrixResolveToGrid(array $matrix =[]): array
    {
        // $statesKeys = [
        //     'dark' => 2,
        //     'wall' => 1,
        //     'light' => 3,
        //     'bulb' => 4 
        // ];
        $statesNames = [
            2=>'dark',
            1=>'wall',
            3=>'light',
            4=>'bulb' 
        ];

        $arr = array();
        foreach ($matrix as $posx => $row) {
            foreach ($row as $posy => $data) {
                $arr[$posx][$posy]= $statesNames[$data];
                //$arr[$posx][$posy]=$statesKeys[$data['state']];
            }
        }

        return [
            'grid'=> $arr,
            'matrix' => $matrix
        ];
    }

    public function getState(int $number): array
    {
        return [];
    }


}