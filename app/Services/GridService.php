<?php

namespace App\Services;

use App\Http\Repository\GridRepository;

class GridService
{
    public const WALL = 0;
    public const HALLWAY = 1;
    public const SCOPE = 3;//GRIDS THAT CAN ILLUMINATE THE BULB

    private GridRepository $gridRepository;
    private $grid;


    public function __construct(
        $gridRepository,
        $grid
    ) {
        $this->gridRepository = $gridRepository;
        $this->grid = $grid;

    }

    public function setGrid()
    {
        try {
             $this->grid = $this->gridRepository->getGridData();
        } catch (\Exception $e) {
            return $e;
        }

        return $this;
    }

    public function getGrid()
    {
        return $this->grid;
    }
}