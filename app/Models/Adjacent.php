<?php

namespace App\Models;

use App\Models\Cell;

class Adjacent extends Cell {
	

	public $distance;

    public $direction;

    public function __construct(
        $direction = '', 
        $distance = 0, 
        $posX = 0, 
        $posY = 0, 
        $position = '',
        $content = '',
        $state = '2'
        )
    {
        $this->distance = $distance;
        $this->direction = $direction;
        $this->posX = $posX;
        $this->posX = $posY;
        $this->position = $position;
        $this->content = $content;
        $this->state = $state;
    }
}