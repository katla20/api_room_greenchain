<?php

namespace App\Services;

class GridService
{
    public const SYNC_RESULT_SUCCESS = 1;
    public const SYNC_RESULT_BAD_FILE = 2;
    public const SYNC_RESULT_UNMODIFIED = 3;

    //private GridRepository $gridRepository;
    private $grid;


    public function __construct(
        //GridRepository $gridRepository,
        $grid
    ) {
        //$this->gridRepository = $gridRepository;
        $this->grid = $grid;

    }

    public function setGrid()
    {
        try {
             $this->grid = $this->gridRepository->getMatrix();
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