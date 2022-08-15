<?php

namespace App\Models;

class Grid
{
    
    protected $collect;
	
	protected $cntRows;
	
	protected $cntCols;

    protected $totalCells;

    protected $dimensions;

    protected $originMatrix;
 

    public function __construct(
        array $originalMatrix = [],
        array $collect = [], 
        int $cntRows = 0, 
        int $cntCols = 0, 
        int $totalCells = 0,
    )
    {
        $this->collect      = $collect;
        $this->cntRows      = $cntRows;
        $this->cntRows      = $cntCols;
        $this->totalCells   = $totalCells;
        $this->originalMatrix = $originalMatrix;
    }
}