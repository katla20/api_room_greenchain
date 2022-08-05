<?php

namespace App\Services;

use App\Models\GridDto;
use App\Services\DtaService;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class GridService extends GridDto implements State
{
    public function __construct(
        DtaService $dta)
    {
        $this->dta = $dta;
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
        return [
            'grid'=> $this->dta->mapGridSolved($matrix),
            'matrix' => $matrix
        ];
    }

    public function getState(int $number): array
    {
        return [];
    }


}