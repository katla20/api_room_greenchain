<?php

namespace App\Models;

class Cell {
	
	public $posX;
 
    public $posY;
	
    public $position;

    public $content;

    public $state;
    // const WALL = 1;
    // const DARK = 2;
    // const LIGHT = 3;
    // const BULB = 4;

    public $adjacent;
    
    public $totalPosAdjacent;

    public $cornerLeft = false;
    public $cornerRight = false;
    public $cornerTop = false;
    public $cornerBottom = false;

	
    public function __construct(
        $posX = 0 , 
        $posY = 0,
        $position = '',
        $content = 0, 
        $state = 0,
        $adjacent = [],
        $totalPosAdjacent = 0)
    {
       
        $this->posX             = $posX;
        $this->posY             = $posY;
        $this->position         = $position; 
        $this->content          = $content;
        $this->state            = $state;
        $this->adjacent         = $adjacent;
        $this->totalPosAdjacent = $totalPosAdjacent;
       
    }
}