<?php

namespace App\Models;

class Pattern {
	
	protected string $name;
 
    protected int $id;
    
    protected $positions = array();

 
    public function __construct(array $positions, array $metadata, $rows, $cols)
    {
        $this->positions = $positions;
        $this->metadata  = $metadata;
        $this->rows      = $rows;
        $this->cols      = $cols;
    }
}